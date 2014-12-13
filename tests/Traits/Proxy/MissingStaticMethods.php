<?php

namespace League\Squery\Test\Traits\Proxy;

trait MissingStaticMethods
{
    /**
     * @param string $class
     *
     * @return void
     */
    protected function assertMissingStaticMethods($class)
    {
        $this->setExpectedException("LogicException");

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
