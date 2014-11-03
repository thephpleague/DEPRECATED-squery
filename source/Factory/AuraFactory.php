<?php

namespace Formativ\Query\Factory;

use Aura\SqlQuery\QueryFactory;
use Aura\SqlQuery\Quoter;
use Aura\SqlQuery\Sqlite\Select;
use Formativ\Query\Builder\AuraBuilder;

class AuraFactory extends QueryFactory implements Factory
{
    /**
     * @param mixed $columns
     *
     * @return AuraBuilder
     */
    public function select($columns = "*")
    {
        if (!is_array($columns)) {
            $columns = [$columns];
        }

        return $this->newSelect()->columns($columns);
    }

    /**
     * @param string $query
     *
     * @return AuraBuilder
     */
    protected function newInstance($query)
    {
        $select = new Select(new Quoter(
            $this->quote_name_prefix,
            $this->quote_name_suffix
        ));

        return new AuraBuilder($select);
    }
}
