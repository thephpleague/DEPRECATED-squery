<?php

namespace League\Squery\Test;

class BuilderProxyTest extends Test
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
            "League\\Squery\\Factory\\BuilderFactory",
            "League\\Squery\\BuilderProxy"
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
            "League\\Squery\\Factory\\BuilderFactory",
            "League\\Squery\\BuilderProxy"
        );
    }

    /**
     * @test
     *
     * @return void
     */
    public function itThrowsForMissingStaticMethods()
    {
        $this->assertMissingStaticMethods("League\\Squery\\BuilderProxy");
    }

    /**
     * @test
     *
     * @return void
     */
    public function itThrowsForMissingMethods()
    {
        $this->assertMissingMethods("League\\Squery\\BuilderProxy");
    }

    /**
     * @test
     *
     * @return void
     */
    public function itThrowsForInvalidFactories()
    {
        $this->assertInvalidFactories("League\\Squery\\BuilderProxy", "select");
    }

    /**
     * @test
     *
     * @return void
     */
    public function itDelegatesMethods()
    {
        $this->assertDelegatesMethods(
            "League\\Squery\\Factory\\BuilderFactory",
            "League\\Squery\\Builder\\Builder", "select",
            "League\\Squery\\BuilderProxy", "select"
        );
    }
}
