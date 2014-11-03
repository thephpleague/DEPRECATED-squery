<?php

namespace Formativ\Query\Builder;

use Aura\SqlQuery\Sqlite\Select;

class AuraBuilder implements Builder
{
    /**
     * @var Select
     */
    protected $select;

    /**
     * @param Select $select
     */
    public function __construct(Select $select)
    {
        $this->select = $select;
    }

    /**
     * @return string
     */
    public function toString()
    {
        return (string) $this->select;
    }

    /**
     * @return $this
     */
    public function distinct()
    {
        $this->select->distinct();

        return $this;
    }

    /**
     * @param string $table
     *
     * @return $this
     */
    public function from($table)
    {
        $this->select->from($table);

        return $this;
    }

    /**
     * @param Builder $builder
     * @param mixed   $alias
     *
     * @return $this
     */
    public function fromSelect(Builder $builder, $alias = null)
    {
        $this->select->fromSubSelect($builder, $alias);

        return $this;
    }

    /**
     * @param string $clause
     * @param mixed  $binding
     *
     * @return $this
     */
    public function where($clause, $binding = null)
    {
        $this->select->where($clause, $binding);

        return $this;
    }

    /**
     * @param string $clause
     * @param mixed  $binding
     *
     * @return $this
     */
    public function orWhere($clause, $binding = null)
    {
        $this->select->orWhere($clause, $binding);

        return $this;
    }

    /**
     * @param mixed $columns
     *
     * @return $this
     */
    public function groupBy($columns)
    {
        if (!is_array($columns)) {
            $columns = [$columns];
        }

        $this->select->groupBy($columns);

        return $this;
    }

    /**
     * @param string $clause
     * @param mixed  $binding
     *
     * @return $this
     */
    public function having($clause, $binding = null)
    {
        $this->select->having($clause, $binding);

        return $this;
    }

    /**
     * @param string $clause
     * @param mixed  $binding
     *
     * @return $this
     */
    public function orHaving($clause, $binding = null)
    {
        $this->select->orHaving($clause, $binding);

        return $this;
    }

    /**
     * @param mixed $columns
     *
     * @return $this
     */
    public function orderBy($columns)
    {
        if (!is_array($columns)) {
            $columns = [$columns];
        }

        $this->select->orderBy($columns);

        return $this;
    }

    /**
     * @param int $limit
     *
     * @return $this
     */
    public function limit($limit)
    {
        $this->select->limit($limit);

        return $this;
    }

    /**
     * @param int $offset
     *
     * @return $this
     */
    public function offset($offset)
    {
        $this->select->offset($offset);

        return $this;
    }

    /**
     * @param string $key
     * @param mixed  $value
     *
     * @return $this
     */
    public function binding($key, $value = null)
    {
        $bindings = $key;

        if (!is_array($bindings)) {
            $bindings = [$key => $value];
        }

        foreach ($bindings as $key => $value) {
            $this->select->bindValue($key, $value);
        }

        return $this;
    }

    /**
     * @param string $columns
     *
     * @return $this
     */
    public function columns($columns = "*")
    {
        if (!is_array($columns)) {
            $columns = [$columns];
        }

        $this->select->cols($columns);

        return $this;
    }
}
