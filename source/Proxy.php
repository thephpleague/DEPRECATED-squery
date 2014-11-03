<?php

namespace Formativ\Query;

class Proxy
{
    /**
     * @var mixed
     */
    protected $instance;

    /**
     * @return mixed
     */
    protected function createNewInstance()
    {
        return new AuraFactory("sqlite");
    }

    /**
     * @param string $method
     * @param array  $parameters
     *
     * @return mixed
     */
    public function __call($method, array $parameters)
    {
        if ($this->instance === null) {
            $this->instance = $this->createNewInstance();
        }

        if (method_exists($this->instance, $method)) {
            return call_user_func_array([$this->instance, $method], $parameters);
        }
    }

    /**
     * @return static
     */
    public static function create()
    {
        return new static();
    }
}
