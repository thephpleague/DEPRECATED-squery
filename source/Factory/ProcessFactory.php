<?php

namespace Formativ\Query\Factory;

use Formativ\Query\Factory;
use Formativ\Query\Process\SymfonyProcess;
use Symfony\Component\Process\Process;

class ProcessFactory implements Factory
{
    /**
     * @return AuraBuilder
     */
    public function newInstance()
    {
        return new SymfonyProcess(
            new Process("echo")
        );
    }
}
