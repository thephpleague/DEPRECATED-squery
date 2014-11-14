<?php

namespace League\Squery\Tests\Process;

use League\Squery\Process\SymfonyProcess;
use League\Squery\Tests\TestCase;
use Mockery;
use Symfony\Component\Process\Process;

class SymfonyProcessTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function itRunsCommands()
    {
        $provider = $this->getNewProcessMock();

        $process = new SymfonyProcess($provider);

        $this->assertOkCallback($provider, $process);

        $this->assertErrorCallback($provider, $process);
    }

    /**
     * @return Process
     */
    protected function getNewProcessMock()
    {
        $provider = Mockery::mock(Process::class);

        $provider->shouldReceive("setCommandLine");
        $provider->shouldReceive("stop");

        return $provider;
    }

    /**
     * @param Process        $provider
     * @param SymfonyProcess $process
     *
     * @return void
     */
    protected function assertOkCallback($provider, $process)
    {
        $provider->shouldReceive("run")
            ->once()
            ->with(
                Mockery::on(function ($callback) {
                    $callback("ok", "mocked ok");

                    return true;
                })
            );

        $response = null;

        $process->run("foo", function ($buffer) use (&$response) {
            $response = $buffer;
        });

        $this->assertEquals("mocked ok", $response);
    }

    /**
     * @param Process        $provider
     * @param SymfonyProcess $process
     *
     * @return void
     */
    protected function assertErrorCallback($provider, $process)
    {
        $provider->shouldReceive("run")
            ->once()
            ->with(
                Mockery::on(function ($callback) {
                    $callback("err", "mocked error");

                    return true;
                })
            );

        $response = null;

        $process->run("foo", null, function ($error) use (&$response) {
            $response = $error;
        });

        $this->assertEquals("mocked error", $response);
    }
}
