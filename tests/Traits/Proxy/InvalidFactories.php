<?php

namespace Formativ\Query\Tests\Traits\Proxy;

use LogicException;
use Mockery;
use Formativ\Query\Factory;

trait InvalidFactories
{
    /**
     * @param string $class
     * @param string $method
     *
     * @return void
     */
    protected function assertInvalidFactories($class, $method)
    {
        $this->setExpectedException(LogicException::class);

        $factory = Mockery::mock(Factory::class);
        $factory->shouldReceive("newInstance")->andReturn($factory);

        $instance = forward_static_call([$class, "with"], $factory);

        $this->assertEquals("mocked", $instance->$method());
    }
}
