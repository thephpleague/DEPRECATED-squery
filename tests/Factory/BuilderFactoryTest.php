<?php

namespace League\Squery\Tests\Factory;

use League\Squery\Builder\Builder;
use League\Squery\Factory\BuilderFactory;
use League\Squery\Tests\TestCase;
use Mockery;

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
