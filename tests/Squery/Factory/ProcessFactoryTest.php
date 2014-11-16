<?php

namespace League\Tests\Squery\Factory;

use League\Squery\Factory\ProcessFactory;
use League\Squery\Process\Process;
use League\Tests\Squery\TestCase;

class ProcessFactoryTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function itCreatesProcesses()
    {
        $factory = new ProcessFactory();

        $this->assertInstanceOf(Process::class, $factory->newInstance());
    }
}
