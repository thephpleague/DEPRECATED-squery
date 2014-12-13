<?php

namespace League\Squery\Factory;

use League\Squery;
use League\Squery\Factory;
use League\Squery\Runner\Runner;

class RunnerFactory implements Factory
{
    /**
     * @return Runner
     */
    public function newInstance()
    {
        return Squery::container()->resolve("squery/runner");
    }
}
