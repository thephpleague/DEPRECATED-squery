<?php

namespace Formativ\Query\Tests\Traits;

use LogicException;
use Mockery;
use Formativ\Query\Factory;

trait InvalidFactories
{
    /**
     * @param string $class
     * @param string $externalMethod
     * @param string $internalMethod
     *
     * @return void
     */
    protected function assertInvalidFactories($class, $externalMethod, $internalMethod)
    {
        $this->setExpectedException(LogicException::class);

        $factory = Mockery::mock(Factory::class);
        $factory->shouldReceive("newInstance")->andReturn($factory);
        $factory->shouldReceive($internalMethod);

        $instance = forward_static_call([$class, "with"], $factory);

        $this->assertEquals("mocked", $instance->$externalMethod());
    }
}
