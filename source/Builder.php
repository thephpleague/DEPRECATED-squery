<?php

namespace Formativ\Query;

use Formativ\Query\Factory\AuraFactory;

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
     * @return AuraFactory
     */
    public function getFactoryInstance()
    {
        if ($this->instance === null) {
            $this->instance = $this->createNewInstance();
        }

        return $this->instance;
    }
}
