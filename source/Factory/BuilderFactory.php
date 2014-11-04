<?php

namespace Formativ\Query\Factory;

use Aura\SqlQuery\Quoter;
use Aura\SqlQuery\Sqlite\Select;
use Formativ\Query\Builder\AuraBuilder;
use Formativ\Query\Factory;

class BuilderFactory implements Factory
{
    /**
     * @return AuraBuilder
     */
    public function newInstance()
    {
        return new AuraBuilder(
            new Select(
                new Quoter('"', '"')
            )
        );
    }
}
