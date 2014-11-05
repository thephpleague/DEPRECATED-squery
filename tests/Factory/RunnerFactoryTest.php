<?php

namespace Formativ\Query\Tests\Factory;

use Formativ\Query\Factory\RunnerFactory;
use Formativ\Query\Runner\Runner;
use Formativ\Query\Tests\TestCase;
use Mockery;

class RunnerFactoryTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function itCreatesProcesses()
    {
        $factory = new RunnerFactory();

        $this->assertInstanceOf(Runner::class, $factory->newInstance());
    }
}
