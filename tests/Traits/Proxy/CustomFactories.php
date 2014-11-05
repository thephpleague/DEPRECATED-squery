<?php

namespace Formativ\Query\Tests\Traits\Proxy;

use Mockery;

trait CustomFactories
{
    /**
     * @param string $factoryClass
     * @param string $proxyClass
     *
     * @return void
     */
    protected function assertCustomFactories($factoryClass, $proxyClass)
    {
        $factory = Mockery::mock($factoryClass);

        $proxy = forward_static_call([$proxyClass, "with"], $factory);

        $this->assertSame($factory, $this->getProtected($proxy, "factory"));
    }
}
