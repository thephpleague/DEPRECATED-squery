<?php

namespace Formativ\Query;

use LogicException;

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

            throw new LogicException("with needs parameters");
        }

        $instance = new static();

        if ($instance->handlesMethod($method)) {
            return $instance->handleMethod($method, $parameters);
        }

        throw new LogicException("{$method} not implemented");
    }
}
