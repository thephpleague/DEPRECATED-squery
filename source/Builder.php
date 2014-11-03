<?php

namespace Formativ\Query;

use Formativ\Query\Factory\AuraFactory;
use Formativ\Query\Factory\Factory;

class Builder extends Proxy
{
    /**
     * @return AuraFactory
     */
    protected function createNewInstance()
    {
        return new AuraFactory("sqlite");
    }

    /**
     * @return Factory
     */
    public function getFactoryInstance()
    {
        if ($this->instance === null) {
            $this->instance = $this->createNewInstance();
        }

        return $this->instance;
    }

    /**
     * @param Factory $factory
     *
     * @return $this
     */
    public function setFactoryInstance(Factory $factory)
    {
        $this->instance = $factory;

        return $this;
    }
}
