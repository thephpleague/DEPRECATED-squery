<?php

namespace Formativ\Query\Tests;

use Formativ\Query\Builder\Builder;
use Formativ\Query\BuilderProxy;
use Formativ\Query\Factory\BuilderFactory;

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
     * @return void
     */
    public function itCreatesDefaultFactory()
    {
        $this->assertCustomFactories(BuilderFactory::class, BuilderProxy::class);
    }

    /**
     * @test
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
        $this->assertInvalidFactories(BuilderProxy::class, "select");
    }

    /**
     * @test
     *
     * @return void
     */
    public function itDelegatesMethods()
    {
        $this->assertDelegatesMethods(BuilderFactory::class, Builder::class, "columns", BuilderProxy::class, "select");
    }
}
