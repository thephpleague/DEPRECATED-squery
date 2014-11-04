<?php

namespace Formativ\Query;

use Formativ\Query\Factory;
use Formativ\Query\Factory\RunnerFactory;
use Formativ\Query\Runner\Runner;
use LogicException;

class RunnerProxy
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
            $factory = new RunnerFactory();
        }

        $this->factory = $factory;
    }

    /**
     * @param string $method
     * @param array  $parameters
     *
     * @return Runner
     *
     * @throws LogicException
     */
    public function __call($method, array $parameters)
    {
        if ($method === "run") {
            $runner = $this->factory->newInstance();

            $this->throwIfUnacceptable($runner, Runner::class);

            return call_user_func_array([$runner, "run"], $parameters);
        }

        throw new LogicException("{$method} not implemented");
    }

    /**
     * @param string $method
     * @param array  $parameters
     *
     * @return RunnerProxy
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

        if ($method === "run") {
            $instance = new static();

            if (count($parameters) > 0) {
                return call_user_func_array([$instance, "run"], $parameters);
            }
        }

        throw new LogicException("{$method} not implemented");
    }
}
