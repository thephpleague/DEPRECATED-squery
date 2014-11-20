<?php

namespace League\Squery\Runner;

use League\Squery\Builder\Builder;

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
}
