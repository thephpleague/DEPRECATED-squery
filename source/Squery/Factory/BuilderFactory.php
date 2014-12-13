<?php

namespace League\Squery\Factory;

use League\Squery;
use League\Squery\Builder\Builder;
use League\Squery\Factory;

class BuilderFactory implements Factory
{
    /**
     * @return Builder
     */
    public function newInstance()
    {
        return Squery::container()->resolve("squery/builder");
    }
}
