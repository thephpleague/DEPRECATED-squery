<?php

namespace League\Squery\Tests\Factory;

use League\Squery\Factory\RunnerFactory;
use League\Squery\Runner\Runner;
use League\Squery\Tests\TestCase;
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
