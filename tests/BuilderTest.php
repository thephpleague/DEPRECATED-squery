<?php

namespace Formativ\Query\Tests;

use Formativ\Query\Builder;
use Formativ\Query\Factory\AuraFactory;
use Formativ\Query\Factory\Factory;
use Mockery;

class BuilderTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function itCreatesFactory()
    {
        $runner = new Builder();

        $this->assertInstanceOf(
            Factory::class, $runner->getFactoryInstance()
        );
    }

    /**
     * @test
     *
     * @return void
     */
    public function itOverridesDependency()
    {
        $mock = Mockery::mock(AuraFactory::class);

        $builder = new Builder();
        $builder->setFactoryInstance($mock);

        $this->assertSame(
            $mock, $builder->getFactoryInstance()
        );
    }
}
