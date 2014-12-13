<?php

namespace League\Squery\Tests\Factory;

use League\Squery\Factory\BuilderFactory;
use League\Squery\Test\Test;

class BuilderFactoryTest extends Test
{
    /**
     * @test
     *
     * @return void
     */
    public function itCreatesBuilders()
    {
        $factory = new BuilderFactory();

        $this->assertInstanceOf("League\\Squery\\Builder\\Builder", $factory->newInstance());
    }
}
