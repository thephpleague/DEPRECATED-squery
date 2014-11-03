<?php

namespace Formativ\Query;

use Formativ\Query\Runner\ProcessRunner;

class Runner extends Proxy
{
    /**
     * @return ProcessRunner
     */
    protected function createNewInstance()
    {
        return new ProcessRunner();
    }

    /**
     * @return Runner
     */
    public function getRunnerInstance()
    {
        if ($this->instance === null) {
            $this->instance = $this->createNewInstance();
        }

        return $this->instance;
    }

    /**
     * @param Runner\Runner $runner
     *
     * @return $this
     */
    public function setRunnerInstance(Runner\Runner $runner)
    {
        $this->instance = $runner;

        return $this;
    }
}
