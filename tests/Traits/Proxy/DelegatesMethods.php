<?php

namespace Formativ\Query\Tests\Traits\Proxy;

use Mockery;

trait DelegatesMethods
{
    /**
     * @param string $factoryClass
     * @param string $providerClass
     * @param string $providerMethod
     * @param string $proxyClass
     * @param string $proxyMethod
     * @param array  $proxyParameters
     *
     * @return void
     */
    protected function assertDelegatesMethods($factoryClass, $providerClass, $providerMethod, $proxyClass, $proxyMethod, $proxyParameters = [])
    {
        $provider = Mockery::mock($providerClass);
        $provider->shouldReceive($providerMethod)->andReturn("mocked");

        $factory = Mockery::mock($factoryClass);
        $factory->shouldReceive("newInstance")->andReturn($provider);

        $proxy = forward_static_call([$proxyClass, "with"], $factory);

        $this->assertEquals("mocked", call_user_func_array([$proxy, $proxyMethod], $proxyParameters));
    }
}
