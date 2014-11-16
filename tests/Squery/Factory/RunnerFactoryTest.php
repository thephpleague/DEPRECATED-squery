<?php

namespace League\Tests\Squery\Factory;

use League\Squery\Factory\RunnerFactory;
use League\Squery\Runner\Runner;
use League\Tests\Squery\TestCase;

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
