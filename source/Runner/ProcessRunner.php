<?php

namespace League\Squery\Runner;

use League\Squery\Builder\Builder;
use League\Squery\Factory;
use League\Squery\Factory\ProcessFactory;
use League\Squery\Process\Process;
use League\Squery\Traits;

class ProcessRunner implements Runner
{
    use Traits\Unacceptable;

    /**
     * @var Factory|ProcessFactory
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
    protected function runCommand($command, callable $onData = null, callable $onError = null)
    {
        $instance = $this->factory->newInstance();

        $this->throwIfUnacceptable($instance, Process::class);

        $instance->run($command, $onData, $onError);

        return $this;
    }
}
