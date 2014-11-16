<?php

namespace League\Tests\Squery;

use League\Squery\Builder\Builder;
use League\Squery\Factory\RunnerFactory;
use League\Squery\Runner\Runner;
use League\Squery\RunnerProxy;
use Mockery;

class RunnerProxyTest extends TestCase
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
        $this->assertCustomFactories(RunnerFactory::class, RunnerProxy::class);
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
        $this->assertCustomFactories(RunnerFactory::class, RunnerProxy::class);
    }

    /**
     * @test
     *
     * @return void
     */
    public function itThrowsForMissingStaticMethods()
    {
        $this->assertMissingStaticMethods(RunnerProxy::class);
    }

    /**
     * @test
     *
     * @return void
     */
    public function itThrowsForMissingMethods()
    {
        $this->assertMissingMethods(RunnerProxy::class);
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
        $builder = Mockery::mock(Builder::class);

        $this->assertDelegatesMethods(RunnerFactory::class, Runner::class, "run", RunnerProxy::class, "run", [$builder]);
    }
}
