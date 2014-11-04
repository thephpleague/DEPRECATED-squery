<?php

namespace Formativ\Query\Tests;

use Formativ\Query\Builder\Builder;
use Formativ\Query\BuilderProxy;
use Formativ\Query\Factory;
use Formativ\Query\Factory\RunnerFactory;
use Formativ\Query\Runner\Runner;
use Formativ\Query\RunnerProxy;
use LogicException;
use Mockery;

class RunnerProxyTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function itCreatesDefaultFactory()
    {
        $runner = new RunnerProxy();

        $this->assertInstanceOf(RunnerFactory::class, $this->getProtected($runner, "factory"));
    }

    /**
     * @test
     *
     * @return void
     */
    public function itAllowsCustomFactories()
    {
        $runner = Mockery::mock(Runner::class);
        $runner->shouldReceive("run")->andReturn("mocked");

        $factory = Mockery::mock(Factory::class);
        $factory->shouldReceive("newInstance")->andReturn($runner);

        $builder = Mockery::mock(Builder::class);

        $runner = RunnerProxy::with($factory);

        $this->assertEquals("mocked", $runner->run($builder));
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
        $factory->shouldReceive("run");

        $builder = RUnnerProxy::with($factory);

        $this->assertEquals("mocked", $builder->run("echo"));
    }
}
