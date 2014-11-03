<?php

namespace Formativ\Query\Tests;

use BadMethodCallException;
use Formativ\Query\Builder;
use Formativ\Query\Factory\AuraFactory;
use Formativ\Query\Runner;
use Formativ\Query\Runner\ProcessRunner;
use Mockery;

class ProxyTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function itDelegateMethods()
    {
        $mock = Mockery::mock(AuraFactory::class);
        $mock->shouldReceive("select")->with("bar")->andReturn("mocked");

        $runner = new Builder();
        $runner->setFactoryInstance($mock);

        $this->assertEquals(
            "mocked", $runner->select("bar")
        );
    }

    /**
     * @test
     *
     * @return void
     */
    public function itCreatesWithoutNew()
    {
        $this->assertInstanceOf(
            Builder::class, Builder::create()
        );
    }

    /**
     * @test
     *
     * @return void
     */
    public function itCreatesDependenciesAutomatically()
    {
        $runner = new Runner();

        $this->assertInstanceOf(
            ProcessRunner::class, $runner->run("ls -la")
        );
    }

    /**
     * @test
     *
     * @return void
     */
    public function itThrowsForMissingMethods()
    {
        $builder = new Builder();

        $this->setExpectedException(BadMethodCallException::class);

        $builder->foo();
    }
}
