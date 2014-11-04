<?php

namespace Formativ\Query;

use Formativ\Query\Builder\Builder;
use Formativ\Query\Factory;
use Formativ\Query\Factory\BuilderFactory;
use LogicException;

class BuilderProxy
{
    use Traits\UnacceptableTrait;

    /**
     * @var Factory
     */
    protected $factory;

    /**
     * @param mixed $factory
     */
    public function __construct(Factory $factory = null)
    {
        if ($factory === null) {
            $factory = new BuilderFactory();
        }

        $this->factory = $factory;
    }

    /**
     * @param string $method
     * @param array  $parameters
     *
     * @return Builder
     *
     * @throws LogicException
     */
    public function __call($method, array $parameters)
    {
        if ($method === "select") {
            $builder = $this->factory->newInstance();

            $this->throwIfUnacceptable($builder, Builder::class);

            return call_user_func_array([$builder, "columns"], $parameters);

        }

        throw new LogicException("{$method} not implemented");
    }

    /**
     * @param string $method
     * @param array  $parameters
     *
     * @return Builder
     *
     * @throws LogicException
     */
    public static function __callStatic($method, array $parameters)
    {
        if ($method === "with") {
            if (count($parameters) > 0) {
                return new static($parameters[0]);
            }
        }

        if ($method === "select") {
            $instance = new static();

            if (count($parameters) > 0) {
                return $instance->select($parameters[0]);
            }
        }

        throw new LogicException("{$method} not implemented");
    }
}
