<?php

namespace Formativ\Query\Tests;

use Formativ\Query\Builder\Builder;
use Formativ\Query\BuilderProxy;
use Formativ\Query\Factory;
use LogicException;
use Mockery;

class BuilderProxyTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function itCreatesDefaultFactory()
    {
        $builder = BuilderProxy::select("*");

        $this->assertInstanceOf(Builder::class, $builder);
    }

    /**
     * @test
     *
     * @return void
     */
    public function itAllowsCustomFactories()
    {
        $builder = Mockery::mock(Builder::class);
        $builder->shouldReceive("columns")->andReturn("mocked");

        $factory = Mockery::mock(Factory::class);
        $factory->shouldReceive("newInstance")->andReturn($builder);

        $builder = BuilderProxy::with($factory);

        $this->assertEquals("mocked", $builder->select("*"));
    }

    /**
     * @test
     *
     * @return void
     */
    public function itThrowsForMissingStaticMethods()
    {
        $this->setExpectedException(LogicException::class);

        BuilderProxy::foo();
    }

    /**
     * @test
     *
     * @return void
     */
    public function itThrowsForMissingMethods()
    {
        $this->setExpectedException(LogicException::class);

        $proxy = new BuilderProxy();

        $proxy->foo();
    }

    /**
     * @test
     *
     * @return void
     */
    public function itThrowsForMissingArguments()
    {
        $this->setExpectedException(LogicException::class);

        BuilderProxy::with();
    }

    /**
     * @test
     *
     * @return void
     */
    public function itThrowsForInvalidFactories()
    {
        $this->setExpectedException(LogicException::class);

        $factory = Mockery::mock(Factory::class);
        $factory->shouldReceive("newInstance")->andReturn($factory);
        $factory->shouldReceive("columns");

        $builder = BuilderProxy::with($factory);

        $this->assertEquals("mocked", $builder->select("*"));
    }
}
