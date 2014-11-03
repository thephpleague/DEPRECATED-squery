<?php

namespace Formativ\Query\Runner;

use Formativ\Query\Builder\Builder;

interface Runner
{
    /**
     * @param string $command
     * @param mixed  $onData
     * @param mixed  $onError
     *
     * @return $this
     */
    public function run($command, $onData = null, $onError = null);

    /**
     * @param Builder $builder
     * @param mixed   $onData
     * @param mixed   $onError
     *
     * @return $this
     */
    public function runQuery(Builder $builder, $onData = null, $onError = null);
}
