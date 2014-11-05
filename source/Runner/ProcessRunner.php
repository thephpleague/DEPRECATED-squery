<?php

namespace Formativ\Query\Runner;

use Formativ\Query\Builder\Builder;
use Formativ\Query\Factory\ProcessFactory;
use Formativ\Query\Process\Process;
use Formativ\Query\Traits;

class ProcessRunner implements Runner
{
    use Traits\Unacceptable;

    /**
     * @var Factory
     */
    protected $factory;

    /**
     * @param Factory|ProcessFactory $factory
     */
    public function __construct(Factory $factory = null)
    {
        if ($factory === null) {
            $factory = new ProcessFactory();
        }

        $this->factory = $factory;
    }

    /**
     * @param Builder       $builder
     * @param callable|null $onData
     * @param callable|null $onError
     *
     * @return $this
     */
    public function run(Builder $builder, callable $onData = null, callable $onError = null)
    {
        $query = $builder->toString();
        $query = str_replace("\n", " ", $query);

        $mode     = ".mode csv";
        $executor = "osqueryi";

        $command = "echo '{$mode}\n{$query};' | {$executor}";

        $this->runCommand($command, function ($buffer) use ($onData) {
            $data = array_map("str_getcsv", explode("\n", $buffer));

            if (count($data[count($data) - 1]) === 1 and empty($data[count($data) - 1][0])) {
                $data = array_slice($data, 0, count($data) - 1);
            }

            if ($onData !== null) {
                $onData($data);
            }
        }, $onError);

        return $this;
    }

    /**
     * @param string        $command
     * @param callable|null $onData
     * @param callable|null $onError
     *
     * @return $this
     */
    public function runCommand($command, callable $onData = null, callable $onError = null)
    {
        $instance = $this->factory->newInstance();

        $this->throwIfUnacceptable($instance, Process::class);

        $instance->run($command, $onData, $onError);

        return $this;
    }
}

/**
 * @param Builder $builder
 * @param mixed   $onData
 * @param mixed   $onError
 *
 * @return $this

public function runQuery(Builder $builder, $onData = null, $onError = null)
 * {
 * $query   = $this->getBuilderQuery($builder);
 * $command = $this->getQueryCommand(escapeshellarg($query));
 *
 * $this->run($command, function ($buffer) use ($onData) {
 * $data = array_map("str_getcsv", explode("\n", $buffer));
 * $this->attemptCall($data, $onData);
 * }, $onError);
 *
 * return $this;
 * }
 *
 * /**
 *
 * @param Builder $builder
 *
 * @return string

protected function getBuilderQuery($builder)
 * {
 * $query = $builder->toString();
 * $query = str_replace("\n", " ", $query);
 *
 * return $query;
 * }
 *
 * /**
 *
 * @param string  $query
 *
 * @return string

protected function getQueryCommand($query)
 * {
 * return "echo '.mode csv\\n{$query};' | osqueryi";
 * }
 *
 * /**
 *
 * @param string  $command
 * @param mixed   $onData
 * @param mixed   $onError
 *
 * @return $this

public function run($command, $onData = null, $onError = null)
 * {
 * $process = $this->createNewProcess($command);
 *
 * $this->runProcess($process, $onError, $onData);
 *
 * return $this;
 * }
 *
 * /**
 *
 * @param         $command
 *
 * @return Process

protected function createNewProcess($command)
 * {
 * return new Process($command);
 * }
 *
 * /**
 *
 * @param mixed   $buffer
 * @param mixed   $callable
 *
 * @return void

protected function attemptCall($buffer, $callable = null)
 * {
 * if (is_callable($callable)) {
 * $callable($buffer);
 * }
 * }
 *
 * /**
 *
 * @param Process $process
 * @param mixed   $onError
 * @param mixed   $onData

protected function runProcess(Process $process, $onError, $onData)
 * {
 * $process->run(function ($type, $buffer) use ($onData, $onError) {
 * $this->processBuffer($type, $buffer, $onError, $onData);
 * });
 * }
 *
 * /**
 * @param string  $type
 * @param mixed   $buffer
 * @param mixed   $onError
 * @param mixed   $onData

protected function processBuffer($type, $buffer, $onError = null, $onData = null)
 * {
 * if (Process::ERR === $type) {
 * $this->attemptCall($buffer, $onError);
 * } else {
 * $this->attemptCall($buffer, $onData);
 * }
 * }
 *
 * */
