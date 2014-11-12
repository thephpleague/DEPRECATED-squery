<?php

namespace League\Squery\Tests\Traits\Proxy;

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

    /**
     * @param string $class
     * @param string $message
     * @param int    $code
     *
     * @return void
     */
    abstract protected function setExpectedException($class, $message = "", $code = null);
}
