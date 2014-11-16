<?php

namespace League\Squery\Factory;

use League\Squery\Factory;
use League\Squery\Runner\ProcessRunner;

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
