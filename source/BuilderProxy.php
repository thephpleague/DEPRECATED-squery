<?php

namespace Formativ\Query;

use Formativ\Query\Builder\Builder;
use Formativ\Query\Factory;
use Formativ\Query\Factory\BuilderFactory;

class BuilderProxy extends AbstractProxy
{
    use Traits\Unacceptable;

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
     *
     * @return bool
     */
    protected function handlesMethod($method)
    {
        return $method === "select";
    }

    /**
     * @param string $method
     * @param array  $parameters
     *
     * @return mixed
     */
    protected function handleMethod($method, array $parameters)
    {
        $builder = $this->factory->newInstance();

        $this->throwIfUnacceptable($builder, Builder::class);

        return call_user_func_array([$builder, "columns"], $parameters);
    }
}
