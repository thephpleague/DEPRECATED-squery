<?php

namespace Formativ\Query\Tests;

use Formativ\Query\Runner;

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
}
