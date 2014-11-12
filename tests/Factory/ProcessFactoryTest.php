<?php

namespace League\Squery\Tests\Factory;

use League\Squery\Factory\ProcessFactory;
use League\Squery\Process\Process;
use League\Squery\Tests\TestCase;
use Mockery;

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
