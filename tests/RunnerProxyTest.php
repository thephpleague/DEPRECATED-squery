<?php

namespace League\Squery\Test;

use Mockery;

class RunnerProxyTest extends Test
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
        $this->assertDefaultFactories(
            "League\\Squery\\Factory\\RunnerFactory",
            "League\\Squery\\RunnerProxy"
        );
    }

    /**
     * @test
     *
     * @return void
     */
    public function itAllowsCustomFactories()
    {
        $this->assertCustomFactories(
            "League\\Squery\\Factory\\RunnerFactory",
            "League\\Squery\\RunnerProxy"
        );
    }

    /**
     * @test
     *
     * @return void
     */
    public function itThrowsForMissingStaticMethods()
    {
        $this->assertMissingStaticMethods("League\\Squery\\RunnerProxy");
    }

    /**
     * @test
     *
     * @return void
     */
    public function itThrowsForMissingMethods()
    {
        $this->assertMissingMethods("League\\Squery\\RunnerProxy");
    }

    /**
     * @test
     *
     * @return void
     */
    public function itThrowsForInvalidFactories()
    {
        $this->assertInvalidFactories("League\\Squery\\RunnerProxy", "select");
    }

    /**
     * @test
     *
     * @return void
     */
    public function itDelegatesMethods()
    {
        $builder = Mockery::mock("League\\Squery\\Builder\\Builder");

        $this->assertDelegatesMethods(
            "League\\Squery\\Factory\\RunnerFactory",
            "League\\Squery\\Runner\\Runner", "run",
            "League\\Squery\\RunnerProxy", "run",
            [$builder]
        );
    }
}
