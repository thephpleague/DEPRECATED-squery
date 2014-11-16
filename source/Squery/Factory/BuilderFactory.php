<?php

namespace League\Squery\Factory;

use Aura\SqlQuery\Quoter;
use Aura\SqlQuery\Sqlite\Select;
use League\Squery\Builder\AuraBuilder;
use League\Squery\Factory;

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
