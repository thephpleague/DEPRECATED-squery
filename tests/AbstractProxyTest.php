<?php

namespace League\Squery\Tests;

use League\Squery\AbstractProxy;

class ConcreteProxy extends AbstractProxy
{
    /**
     * @param string $method
     *
     * @return bool
     */
    protected function handlesMethod($method)
    {
        return $method === "foo";
    }

    /**
     * @param string $method
     * @param array  $parameters
     *
     * @return mixed
     */
    protected function handleMethod($method, array $parameters)
    {
        return true;
    }
}

class AbstractProxyTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function itHandlesStaticMethodCalls()
    {
        ConcreteProxy::foo();
    }
}
