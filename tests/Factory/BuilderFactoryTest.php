<?php

namespace Formativ\Query\Tests\Factory;

use Formativ\Query\Factory\BuilderFactory;
use Formativ\Query\Builder\Builder;
use Formativ\Query\Tests\TestCase;
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
