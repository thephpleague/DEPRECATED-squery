<?php

namespace Formativ\Query\Tests;

use Formativ\Query\Builder\Builder;
use Formativ\Query\Factory\RunnerFactory;
use Formativ\Query\Runner\Runner;
use Formativ\Query\RunnerProxy;
use Mockery;

class RunnerProxyTest extends TestCase
{
    use Traits\Proxy\CustomFactories;
    use Traits\Proxy\DefaultFactories;
    use Traits\Proxy\DelegatesMethods;
    use Traits\Proxy\InvalidFactories;
    use Traits\Proxy\MissingArguments;
    use Traits\Proxy\MissingMethods;
    use Traits\Proxy\MissingStaticMethods;

    /**
     * @test
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
    public function itThrowsForMissingArguments()
    {
        $this->assertMissingArguments(RunnerProxy::class);
    }

    /**
     * @test
     *
     * @return void
     */
    public function itThrowsForInvalidFactories()
    {
        $this->assertInvalidFactories(RunnerProxy::class, "run");
    }

    /**
     * @test
     *
     * @return void
     */
    public function itDelegatesMethods()
    {
        $builder = Mockery::mock(Builder::class);

        $this->assertDelegatesMethods(RunnerFactory::class, Runner::class, "run", RunnerProxy::class, "run", [$builder]);
    }
}
