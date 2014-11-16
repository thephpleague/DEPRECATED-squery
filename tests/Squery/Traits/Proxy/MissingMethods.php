<?php

namespace League\Tests\Squery\Traits\Proxy;

use LogicException;

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

    /**
     * @param string $class
     * @param string $message
     * @param int    $code
     *
     * @return void
     */
    abstract protected function setExpectedException($class, $message = "", $code = null);
}
