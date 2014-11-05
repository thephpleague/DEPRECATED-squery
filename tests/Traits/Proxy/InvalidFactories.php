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

    /**
     * @param mixed  $expected
     * @param mixed  $actual
     * @param string $message
     * @param int    $delta
     * @param int    $maxDepth
     * @param bool   $canonicalize
     * @param bool   $ignoreCase
     *
     * @return void
     */
    abstract protected function assertEquals($expected, $actual, $message = "", $delta = 0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false);
}
