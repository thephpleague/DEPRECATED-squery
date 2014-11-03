<?php

namespace Formativ\Query\Tests\Builder;

use Aura\SqlQuery\Sqlite\Select;
use Formativ\Query\Builder\AuraBuilder;
use Formativ\Query\Tests\TestCase;
use Mockery;

class AuraBuilderTest extends TestCase
{
    /**
     * @var array
     */
    protected $delegates = [];

    /**
     * @param       $localMethod
     * @param array $localParameters
     * @param       $delegateMethod
     * @param array $delegateParameters
     */
    protected function addDelegate($localMethod, array $localParameters, $delegateMethod, array $delegateParameters)
    {
        array_push($this->delegates, compact(
            "localMethod",
            "localParameters",
            "delegateMethod",
            "delegateParameters"
        ));
    }

    /**
     * @test
     *
     * @return void
     */
    public function itDelegatesToSelect()
    {
        $this->addDelegates();

        foreach ($this->delegates as $delegate) {
            $select = $this->getNewSelectMock($delegate);

            $builder = new AuraBuilder($select);

            call_user_func_array(
                [$builder, $delegate["localMethod"]],
                $delegate["localParameters"]
            );
        }
    }

    /**
     * @param array $delegate
     *
     * @return Select
     */
    protected function getNewSelectMock(array $delegate = [])
    {
        $mock = Mockery::mock(Select::class);

        if (isset($delegate["delegateMethod"])) {
            $this->addExpectationToSelectMock($delegate, $mock);
        }

        return $mock;
    }

    /**
     * @return void
     */
    protected function addDelegates()
    {
        $this->addDelegate("distinct", [], "distinct", []);

        $this->addDelegate("columns", ["*"], "cols", [["*"]]);
        $this->addDelegate("columns", [["*"]], "cols", [["*"]]);

        $this->addDelegate("from", ["processes"], "from", ["processes"]);

        $builder = new AuraBuilder($this->getNewSelectMock());

        $this->addDelegate("fromSelect", [$builder, null], "fromSubSelect", [$builder, null]);
        $this->addDelegate("fromSelect", [$builder, "foo"], "fromSubSelect", [$builder, "foo"]);

        $this->addDelegate("where", ["foo", null], "where", ["foo", null]);
        $this->addDelegate("where", ["foo", "bar"], "where", ["foo", "bar"]);

        $this->addDelegate("orWhere", ["foo", "bar"], "orWhere", ["foo", "bar"]);
        $this->addDelegate("orWhere", ["foo", "bar"], "orWhere", ["foo", "bar"]);

        $this->addDelegate("groupBy", ["name"], "groupBy", [["name"]]);
        $this->addDelegate("groupBy", [["name"]], "groupBy", [["name"]]);

        $this->addDelegate("having", ["foo", null], "having", ["foo", null]);
        $this->addDelegate("having", ["foo", "bar"], "having", ["foo", "bar"]);

        $this->addDelegate("orHaving", ["foo", "bar"], "orHaving", ["foo", "bar"]);
        $this->addDelegate("orHaving", ["foo", "bar"], "orHaving", ["foo", "bar"]);

        $this->addDelegate("orderBy", ["name"], "orderBy", [["name"]]);
        $this->addDelegate("orderBy", [["name"]], "orderBy", [["name"]]);

        $this->addDelegate("limit", [1], "limit", [1]);

        $this->addDelegate("offset", [2], "offset", [2]);

        $this->addDelegate("binding", ["foo", "bar"], "bindValue", ["foo", "bar"]);
        $this->addDelegate("binding", [["foo" => "bar"]], "bindValue", ["foo", "bar"]);
    }

    /**
     * @param array $delegate
     * @param       $mock
     */
    protected function addExpectationToSelectMock(array $delegate, $mock)
    {
        $expectation = $mock->shouldReceive(
            $delegate["delegateMethod"]
        );

        call_user_func_array(
            [$expectation, "with"],
            $delegate["delegateParameters"]
        );
    }

    /**
     * @test
     *
     * @return void
     */
    public function itCastsToString()
    {
        $mock = $this->getNewSelectMock();
        $mock->shouldReceive("__toString")->andReturn("mocked");

        $builder = new AuraBuilder($mock);

        $this->assertEquals(
            "mocked", $builder->toString()
        );
    }
}
