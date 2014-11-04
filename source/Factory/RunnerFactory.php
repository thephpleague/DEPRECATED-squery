<?php

namespace Formativ\Query\Factory;

use Formativ\Query\Factory;
use Formativ\Query\Runner\ProcessRunner;

class RunnerFactory implements Factory
{
    /**
     * @return ProcessRunner
     */
    public function newInstance()
    {
        return new ProcessRunner();
    }
}
