<?php

namespace Formativ\Query\Tests\Factory;

use Formativ\Query\Factory\ProcessFactory;
use Formativ\Query\Process\Process;
use Formativ\Query\Tests\TestCase;
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
