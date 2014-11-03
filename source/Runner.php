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
}
