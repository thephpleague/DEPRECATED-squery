<?php

namespace League\Squery\Tests\Factory;

use League\Squery\Factory\ProcessFactory;
use League\Squery\Test\Test;

class ProcessFactoryTest extends Test
{
    /**
     * @test
     *
     * @return void
     */
    public function itCreatesProcesses()
    {
        $factory = new ProcessFactory();

        $this->assertInstanceOf("League\\Squery\\Process\\Process", $factory->newInstance());
    }
}
