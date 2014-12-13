<?php

namespace League\Squery\Tests\Factory;

use League\Squery\Factory\RunnerFactory;
use League\Squery\Test\Test;

class RunnerFactoryTest extends Test
{
    /**
     * @test
     *
     * @return void
     */
    public function itCreatesProcesses()
    {
        $factory = new RunnerFactory();

        $this->assertInstanceOf("League\\Squery\\Runner\\Runner", $factory->newInstance());
    }
}
