<?php

namespace Formativ\Query\Tests;

use Formativ\Query\Builder\Builder;
use Formativ\Query\BuilderProxy;
use Formativ\Query\Factory;
use Formativ\Query\Factory\BuilderFactory;
use LogicException;
use Mockery;

class BuilderProxyTest extends TestCase
{
    use Traits\InvalidFactories;

    /**
     * @test
     *
     * @return void
     */
    public function itCreatesDefaultFactory()
    {
        $builder = new BuilderProxy();

        $this->assertInstanceOf(BuilderFactory::class, $this->getProtected($builder, "factory"));
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
        $this->assertInvalidFactories(BuilderProxy::class, "select", "columns");
    }
}
