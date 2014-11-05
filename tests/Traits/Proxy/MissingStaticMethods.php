<?php

namespace Formativ\Query\Tests\Traits\Proxy;

use LogicException;
use Mockery;

trait MissingStaticMethods
{
    /**
     * @param string $class
     *
     * @return void
     */
    protected function assertMissingStaticMethods($class)
    {
        $this->setExpectedException(LogicException::class);

        forward_static_call([$class, "foo"]);
    }
}
