<?php

namespace Formativ\Query\Tests\Traits\Proxy;

use LogicException;
use Mockery;

trait MissingMethods
{
    /**
     * @param string $class
     *
     * @return void
     */
    protected function assertMissingMethods($class)
    {
        $this->setExpectedException(LogicException::class);

        $proxy = new $class();

        $proxy->foo();
    }
}
