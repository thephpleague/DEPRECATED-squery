<?php

namespace Formativ\Query\Runner;

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
}
