<?php

namespace League\Squery\Test;

use Mockery;
use PHPUnit_Framework_TestCase;
use ReflectionClass;

class Test extends PHPUnit_Framework_TestCase
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
    protected function getProtectedProperty($object, $property)
    {
        $reflection = new ReflectionClass($object);

        $property = $reflection->getProperty($property);
        $property->setAccessible(true);

        return $property->getValue($object);
    }
}
