<?php

namespace Formativ\Query\Process;

interface Process
{
    /**
     * @param string        $command
     * @param callable|null $onData
     * @param callable|null $onError
     *
     * @return $this
     */
    public function run($command, callable $onData = null, callable $onError = null);
}
