<?php

namespace Formativ\Query;

use Formativ\Query\Factory;
use Formativ\Query\Factory\RunnerFactory;
use Formativ\Query\Runner\Runner;

class RunnerProxy extends AbstractProxy
{
    use Traits\Unacceptable;

    /**
     * @var Factory
     */
    protected $factory;

    /**
     * @param Factory|RunnerFactory $factory
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
     *
     * @return bool
     */
    protected function handlesMethod($method)
    {
        return $method === "run";
    }

    /**
     * @param string $method
     * @param array  $parameters
     *
     * @return mixed
     */
    protected function handleMethod($method, array $parameters)
    {
        $runner = $this->factory->newInstance();

        $this->throwIfUnacceptable($runner, Runner::class);

        return call_user_func_array([$runner, "run"], $parameters);
    }
}
