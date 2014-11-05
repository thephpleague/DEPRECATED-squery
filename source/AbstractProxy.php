<?php

namespace Formativ\Query;

use LogicException;
use ReflectionClass;

abstract class AbstractProxy
{
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
        if ($this->handlesMethod($method)) {
            return $this->handleMethod($method, $parameters);
        }

        throw new LogicException("{$method} not implemented");
    }

    /**
     * @param string $method
     *
     * @return bool
     */
    abstract protected function handlesMethod($method);

    /**
     * @param string $method
     * @param array  $parameters
     *
     * @return mixed
     */
    abstract protected function handleMethod($method, array $parameters);

    /**
     * @param string $method
     * @param array  $parameters
     *
     * @return mixed
     *
     * @throws LogicException
     */
    public static function __callStatic($method, array $parameters)
    {
        $class = get_called_class();

        if ($method === "with") {
            $reflection = new ReflectionClass($class);

            return $reflection->newInstanceArgs($parameters);
        }

        $instance = new $class();

        if ($instance->handlesMethod($method)) {
            return $instance->handleMethod($method, $parameters);
        }

        throw new LogicException("{$method} not implemented");
    }
}
