<?php

namespace League\Squery;

use League\Squery\Builder\Builder;
use League\Squery\Factory\BuilderFactory;

class BuilderProxy extends AbstractProxy
{
    use Traits\Unacceptable;

    /**
     * @var Factory|BuilderFactory
     */
    protected $factory;

    /**
     * @param Factory|BuilderFactory $factory
     */
    public function __construct(Factory $factory = null)
    {
        if ($factory === null) {
            $factory = new BuilderFactory();
        } else {
            trigger_error(
                "Factories are depreciated (http://squery.thephpleague.com/services)",
                E_USER_DEPRECATED
            );
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

        return call_user_func_array([$builder, "select"], $parameters);
    }
}
