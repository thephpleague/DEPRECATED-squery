<?php

namespace League\Squery\Runner;

use League\Squery;
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
        } else {
            Squery::depreciate("Factories are depreciated (http://squery.thephpleague.com/services)");
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
        $command = $this->getCommandFromQuery($builder);

        $this->runCommand($command, function ($buffer) use ($onData) {
            $data = $this->getRowsFromBuffer($buffer);

            if ($onData !== null) {
                $onData($data);
            }
        }, $onError);

        return $this;
    }

    /**
     * @param Builder $builder
     *
     * @return string
     */
    protected function getCommandFromQuery(Builder $builder)
    {
        $query    = trim((string) $builder);
        $replaced = preg_replace("#\\s+#", " ", $query);

        return "echo '.mode csv\n{$replaced};' | osqueryi";
    }

    /**
     * @param string $buffer
     *
     * @return array
     */
    protected function getRowsFromBuffer($buffer)
    {
        $lines = explode("\n", trim($buffer));

        return array_map("str_getcsv", $lines);
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

        $this->throwIfUnacceptable($instance, "League\\Squery\\Process\\Process");

        $instance->run($command, $onData, $onError);

        return $this;
    }
}
