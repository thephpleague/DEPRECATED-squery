<?php

namespace Formativ\Query\Tests\Traits\Proxy;

use LogicException;
use Mockery;

trait MissingArguments
{
    /**
     * @param string $class
     *
     * @return void
     */
    protected function assertMissingArguments($class)
    {
        $this->setExpectedException(LogicException::class);

        forward_static_call([$class, "with"]);
    }
}
