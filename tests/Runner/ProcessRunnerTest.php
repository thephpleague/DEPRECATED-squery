<?php

namespace League\Squery\Tests\Builder;

use League\Squery\Builder\Builder;
use League\Squery\Factory;
use League\Squery\Process\Process;
use League\Squery\Runner\ProcessRunner;
use League\Squery\Tests\TestCase;
use LogicException;
use Mockery;

class ProcessRunnerTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function itRunsQueries()
    {
        $query = "\nmocked\n \t \nbuilder\n";

        $command = "echo '.mode csv\nmocked builder;' | osqueryi";

        $builder = $this->getNewBuilderMock();

        $builder->shouldReceive("__toString")
            ->andReturn($query);

        $process = $this->getNewProcessMock();

        $factory = $this->getNewFactoryMock();

        $runner = new ProcessRunner($factory);

        $this->assertRowsHandled($command, $process, $runner, $builder, $factory);

        $this->assertFactoryReturnsValidProcess($factory, $runner, $builder);

        $this->assertErrorsHandled($command, $process, $runner, $builder);
    }

    /**
     * @return Mockery\MockInterface
     */
    protected function getNewBuilderMock()
    {
        return Mockery::mock(Builder::class);
    }

    /**
     * @return Mockery\MockInterface
     */
    protected function getNewProcessMock()
    {
        return Mockery::mock(Process::class);
    }

    /**
     * @return Mockery\MockInterface
     */
    protected function getNewFactoryMock()
    {
        return Mockery::mock(Factory::class);
    }

    /**
     * @param string        $command
     * @param Process       $process
     * @param ProcessRunner $runner
     * @param Builder       $builder
     * @param Factory       $factory
     *
     * @return void
     */
    protected function assertRowsHandled($command, Process $process, ProcessRunner $runner, Builder $builder, Factory $factory)
    {
        $buffer = "name\nfoo\nbar\n";

        $rows = [
            ["name"],
            ["foo"],
            ["bar"],
        ];

        $process->shouldReceive("run")
            ->once()
            ->with($command, Mockery::on(function ($callback) use ($buffer) {
                $callback($buffer);

                return true;
            }), null);

        $factory->shouldReceive("newInstance")
            ->once()
            ->andReturn($process);

        $result = null;

        $runner->run($builder, function (array $data) use (&$result) {
            $result = $data;
        });

        $this->assertEquals($rows, $result);
    }

    /**
     * @param Factory       $factory
     * @param ProcessRunner $runner
     * @param Builder       $builder
     *
     * @return void
     */
    protected function assertFactoryReturnsValidProcess(Factory $factory, ProcessRunner $runner, Builder $builder)
    {
        $this->setExpectedException(LogicException::class);

        $factory->shouldReceive("newInstance")
            ->andReturn($factory);

        $runner->run($builder);
    }

    /**
     * @param string        $command
     * @param Process       $process
     * @param ProcessRunner $runner
     * @param Builder       $builder
     *
     * @return void
     */
    protected function assertErrorsHandled($command, Process $process, ProcessRunner $runner, Builder $builder)
    {
        $process->shouldReceive("run")
            ->once()
            ->with($command, null, Mockery::on(function ($callback) {
                $callback("error");

                return true;
            }));

        $result = null;

        $runner->run($builder, null, function ($error) use (&$result) {
            $result = $error;
        });

        $this->assertEquals("error", $result);
    }
}
