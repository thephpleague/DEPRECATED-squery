<?php

namespace League\Squery\Factory;

use League\Squery;
use League\Squery\Factory;
use League\Squery\Process\Process;

class ProcessFactory implements Factory
{
    /**
     * @return Process
     */
    public function newInstance()
    {
        return Squery::container()["squery/process"];
    }
}
