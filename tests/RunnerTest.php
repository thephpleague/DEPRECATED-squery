<?php

namespace Formativ\Query\Tests;

use Formativ\Query\Runner;
use Formativ\Query\Runner\ProcessRunner;
use Mockery;

class RunnerTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function itCreatesRunner()
    {
        $runner = new Runner();

        $this->assertInstanceOf(
            Runner\Runner::class, $runner->getRunnerInstance()
        );
    }

    /**
     * @test
     *
     * @return void
     */
    public function itOverridesDependency()
    {
        $mock = Mockery::mock(ProcessRunner::class);

        $runner = new Runner();
        $runner->setRunnerInstance($mock);

        $this->assertSame(
            $mock, $runner->getRunnerInstance()
        );
    }
}
