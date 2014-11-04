<?php

namespace Formativ\Query\Runner;

use Formativ\Query\Builder\Builder;

interface Runner
{
    /**
     * @param Builder       $builder
     * @param callable|null $onData
     * @param callable|null $onError
     *
     * @return $this
     */
    public function run(Builder $builder, callable $onData = null, callable $onError = null);

    /**
     * @param string $command
     * @param callable|null $onData
     * @param callable|null $onError
     *
     * @return $this
     */
    public function runCommand($command, callable $onData = null, callable $onError = null);
}
