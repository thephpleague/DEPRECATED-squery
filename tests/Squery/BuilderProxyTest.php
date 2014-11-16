<?php

namespace League\Tests\Squery;

use League\Squery\Builder\Builder;
use League\Squery\BuilderProxy;
use League\Squery\Factory\BuilderFactory;
use LogicException;
use Mockery;
use League\Squery\Factory;

class BuilderProxyTest extends TestCase
{
    use Traits\Proxy\CustomFactories;
    use Traits\Proxy\DefaultFactories;
    use Traits\Proxy\DelegatesMethods;
    use Traits\Proxy\InvalidFactories;
    use Traits\Proxy\MissingMethods;
    use Traits\Proxy\MissingStaticMethods;

    /**
     * @test
     *
     * @expectedException PHPUnit_Framework_Error_Deprecated
     *
     * @return void
     */
    public function itCreatesDefaultFactory()
    {
        $this->assertCustomFactories(BuilderFactory::class, BuilderProxy::class);
    }

    /**
     * @test
     *
     * @expectedException PHPUnit_Framework_Error_Deprecated
     *
     * @return void
     */
    public function itAllowsCustomFactories()
    {
        $this->assertCustomFactories(BuilderFactory::class, BuilderProxy::class);
    }

    /**
     * @test
     *
     * @return void
     */
    public function itThrowsForMissingStaticMethods()
    {
        $this->assertMissingStaticMethods(BuilderProxy::class);
    }

    /**
     * @test
     *
     * @return void
     */
    public function itThrowsForMissingMethods()
    {
        $this->assertMissingMethods(BuilderProxy::class);
    }

    /**
     * @test
     *
     * @return void
     */
    public function itThrowsForInvalidFactories()
    {
        $this->markTestIncomplete();
    }

    /**
     * @test
     *
     * @expectedException PHPUnit_Framework_Error_Deprecated
     *
     * @return void
     */
    public function itDelegatesMethods()
    {
        $this->assertDelegatesMethods(BuilderFactory::class, Builder::class, "select", BuilderProxy::class, "select");
    }
}
