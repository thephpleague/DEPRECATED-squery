<?php

namespace League\Tests\Squery\Factory;

use League\Squery\Builder\Builder;
use League\Squery\Factory\BuilderFactory;
use League\Tests\Squery\TestCase;

class BuilderFactoryTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function itCreatesBuilders()
    {
        $factory = new BuilderFactory();

        $this->assertInstanceOf(Builder::class, $factory->newInstance());
    }
}
