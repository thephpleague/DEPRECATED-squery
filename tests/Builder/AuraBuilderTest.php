<?php

namespace League\Squery\Test\Builder;

use League\Squery\Builder\AuraBuilder;
use League\Squery\Test\Test;
use Mockery;

class AuraBuilderTest extends Test
{
    /**
     * @test
     *
     * @return void
     */
    public function itDelegatesMethods()
    {
        $methods = [
            ["select", ["*"], "cols", [["*"]]],
            ["columns", ["*"], "cols", [["*"]]],
            ["from", ["foo"], "from", ["foo"]],
            ["where", ["foo"], "where", ["foo"]],
            ["where", ["foo", "bar"], "where", ["foo", "bar"]],
            ["orWhere", ["foo"], "orWhere", ["foo"]],
            ["orWhere", ["foo", "bar"], "orWhere", ["foo", "bar"]],
            ["groupBy", ["*"], "groupBy", [["*"]]],
            ["having", ["foo"], "having", ["foo"]],
            ["having", ["foo", "bar"], "having", ["foo", "bar"]],
            ["orHaving", ["foo"], "orHaving", ["foo"]],
            ["orHaving", ["foo", "bar"], "orHaving", ["foo", "bar"]],
            ["orderBy", ["*"], "orderBy", [["*"]]],
            ["limit", [1], "limit", [1]],
            ["offset", [2], "offset", [2]],
            ["binding", ["foo", "bar"], "bindValue", ["foo", "bar"]],
            ["binding", [["foo" => "bar"]], "bindValue", ["foo", "bar"]],
        ];

        $mock = Mockery::mock("League\\Squery\\Builder\\AuraBuilder");

        $mock->shouldReceive("__toString")
            ->andReturn("mocked");

        $methods = array_merge($methods, [
            ["fromSelect", [$mock, "foo"], "fromSubSelect", ["mocked", "foo"]],
            ["fromSelect", [$mock], "fromSubSelect", ["mocked", Mockery::type("string")]]
        ]);

        foreach ($methods as $method) {
            list($builderMethod, $builderParameters, $providerMethod, $providerParameters) = $method;

            $select = $this->createNewSelect($providerMethod, $providerParameters);

            $builder = new AuraBuilder($select);

            call_user_func_array([$builder, $builderMethod], $builderParameters);
        }
    }

    /**
     * @param string|null $method
     * @param array       $parameters
     *
     * @return Mockery\MockInterface
     */
    protected function createNewSelect($method = null, array $parameters = [])
    {
        $select = Mockery::mock("Aura\\SqlQuery\\Sqlite\\Select");

        if ($method !== null) {
            $select->shouldReceive($method)
                ->withArgs($parameters);
        }

        return $select;
    }

    /**
     * @test
     *
     * @return void
     */
    public function itGeneratesStrings()
    {
        $select = $this->createNewSelect();

        $select->shouldReceive("__toString")
            ->andReturn("mocked");

        $builder = new AuraBuilder($select);

        $this->assertEquals("mocked", (string) $builder);
    }
}
