<?php

namespace League\Tests\Squery\Traits\Proxy;

use LogicException;

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
