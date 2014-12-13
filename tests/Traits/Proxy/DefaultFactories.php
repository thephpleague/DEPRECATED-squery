<?php

namespace League\Squery\Test\Traits\Proxy;

trait DefaultFactories
{
    /**
     * @param string $factoryClass
     * @param string $proxyClass
     *
     * @return void
     */
    protected function assertDefaultFactories($factoryClass, $proxyClass)
    {
        $proxy = new $proxyClass();

        $this->assertInstanceOf($factoryClass, $this->getProtectedProperty($proxy, "factory"));
    }

    /**
     * @param string $class
     * @param mixed  $actual
     * @param string $message
     *
     * @return void
     */
    abstract protected function assertInstanceOf($class, $actual, $message = "");

    /**
     * @param mixed  $object
     * @param string $property
     *
     * @return mixed
     */
    abstract protected function getProtectedProperty($object, $property);
}
