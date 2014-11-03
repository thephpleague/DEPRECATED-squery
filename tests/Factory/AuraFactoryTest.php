<?php

namespace Formativ\Query\Tests\Factory;

use Formativ\Query\Builder\AuraBuilder;
use Formativ\Query\Factory\AuraFactory;
use Formativ\Query\Tests\TestCase;

class AuraFactoryTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function itCreatesNewBuilders()
    {
        $factory = new AuraFactory("sqlite");

        $this->assertInstanceOf(
            AuraBuilder::class, $factory->select()
        );

        $this->assertInstanceOf(
            AuraBuilder::class, $factory->select("*")
        );

        $this->assertInstanceOf(
            AuraBuilder::class, $factory->select(["*"])
        );
    }
}
