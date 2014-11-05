<?php

namespace Formativ\Query\Tests\Traits\Proxy;

use Mockery;

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

        $this->assertInstanceOf($factoryClass, $this->getProtected($proxy, "factory"));
    }
}