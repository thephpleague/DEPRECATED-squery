<?php

namespace Formativ\Query\Factory;

use Formativ\Query\Builder\Builder;

interface Factory
{
    /**
     * @param mixed $columns
     *
     * @return Builder
     */
    public function select($columns = "*");
}
