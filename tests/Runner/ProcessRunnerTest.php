<?php

namespace Formativ\Query\Tests\Runner;

use Formativ\Query\Builder;
use Formativ\Query\Runner\ProcessRunner;
use Formativ\Query\Tests\TestCase;

class ProcessRunnerTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function itRunsProcesses()
    {
        $runner = new ProcessRunner();
        $processes = [];

        $runner->run("ls -la", function($buffer) use (&$processes) {
           $processes = explode("\n", $buffer);
        });

        $this->assertInternalType("array", $processes);
        $this->assertGreaterThan(1, count($processes));
    }


    /**
     * @test
     *
     * @return void
     */
    public function itHandlesErrors()
    {
        $runner = new ProcessRunner();
        $error = [];

        $runner->run("foo", null, function($buffer) use (&$error) {
            $error = explode("\n", $buffer);
        });

        $this->assertInternalType("array", $error);
        $this->assertGreaterThan(1, count($error));
    }

    /**
     * @test
     *
     * @return void
     */
    public function itRunsProcessesFromBuilders()
    {
        $builder = new Builder();
        $query = $builder->select("name")->from("processes")->limit(5);

        $runner = new ProcessRunner();
        $processes = [];

        $runner->runQuery($query, function($data) use (&$processes) {
            $processes = $data;
        });

        $this->assertInternalType("array", $processes);
        $this->assertGreaterThan(1, count($processes));
    }
}
