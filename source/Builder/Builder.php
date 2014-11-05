<?php

namespace Formativ\Query\Builder;

interface Builder
{
    /**
     * @return string
     */
    public function toString();

    /**
     * @return string
     */
    public function __toString();

    /**
     * @param string $columns
     *
     * @return $this
     */
    public function select($columns = "*");

    /**
     * @param string $columns
     *
     * @return $this
     */
    public function columns($columns = "*");

    /**
     * @param string $table
     *
     * @return $this
     */
    public function from($table);

    /**
     * @param Builder $builder
     * @param mixed   $alias
     *
     * @return $this
     */
    public function fromSelect(Builder $builder, $alias = null);

    /**
     * @param string $clause
     * @param mixed  $binding
     *
     * @return $this
     */
    public function where($clause, $binding = null);

    /**
     * @param string $clause
     * @param mixed  $binding
     *
     * @return $this
     */
    public function orWhere($clause, $binding = null);

    /**
     * @param mixed $columns
     *
     * @return $this
     */
    public function groupBy($columns);

    /**
     * @param string $clause
     * @param mixed  $binding
     *
     * @return $this
     */
    public function having($clause, $binding = null);

    /**
     * @param string $clause
     * @param mixed  $binding
     *
     * @return $this
     */
    public function orHaving($clause, $binding = null);

    /**
     * @param mixed $columns
     *
     * @return $this
     */
    public function orderBy($columns);

    /**
     * @param int $limit
     *
     * @return $this
     */
    public function limit($limit);

    /**
     * @param int $offset
     *
     * @return $this
     */
    public function offset($offset);

    /**
     * @param string $key
     * @param mixed  $value
     *
     * @return $this
     */
    public function binding($key, $value = null);
}
