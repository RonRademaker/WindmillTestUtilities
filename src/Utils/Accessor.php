<?php

namespace ConnectHolland\WindmillTestUtilities\Utils;

use ReflectionClass;

/**
 * Proxy object allowed full access to private and protected methods and properties
 *
 * @author Ron Rademaker
 */
class Accessor
{
    /**
     * The object to access
     *
     * @var mixed
     */
    private $object;

    /**
     * Reflection class for the set object
     *
     * @var ReflectionClass
     */
    private $reflectionClass;

    /**
     * Creates the accessor for $object
     *
     * @param mixed $object
     */
    public function __construct($object)
    {
        $this->object = $object;
        $this->reflectionClass = new ReflectionClass(get_class($object));
    }

    /**
     * Gets a property
     *
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        $property = $this->reflectionClass->getProperty($name);
        $property->setAccessible(true);

        return $property->getValue($this->object);
    }

    /**
     * Sets a property
     *
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {
        $property = $this->reflectionClass->getProperty($name);
        $property->setAccessible(true);

        $property->setValue($this->object, $value);
    }

    /**
     * Calls a method and returns it result
     *
     * @param string $name
     * @param array $arguments
     * @return $mixed
     */
    public function __call($name, $arguments)
    {
        $method = $this->reflectionClass->getMethod($name);
        $method->setAccessible(true);

        return $method->invokeArgs($this->object, $arguments);
    }

    /**
     * Calls a static method and returns it result
     *
     * @param string $name
     * @param array $arguments
     * @return $mixed
     */
    public static function __callStatic($name, $arguments)
    {
        $method = $this->reflectionClass->getMethod($name);
        $method->setAccessible(true);

        return $method->invokeArgs(null, $arguments);
    }
}
