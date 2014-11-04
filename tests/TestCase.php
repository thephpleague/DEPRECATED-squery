<?php

namespace Formativ\Query\Tests;

use Mockery;
use PHPUnit_Framework_TestCase;
use ReflectionClass;

class TestCase extends PHPUnit_Framework_TestCase
{
    /**
     * @return void
     */
    public function tearDown()
    {
        Mockery::close();
    }

    /**
     * @param mixed  $object
     * @param string $property
     *
     * @return mixed
     */
    protected function getProtected($object, $property)
    {
        $reflection = new ReflectionClass($object);

        $property = $reflection->getProperty($property);
        $property->setAccessible(true);

        return $property->getValue($object);
    }
}
