<?php

namespace Tests\Helper\Utils;

use ReflectionClass;

/**
 * For access unaccessible methods and properties.
 *
 * NOTE: DO NOT USE this trait in production code. you should use this only testing.
 */
trait CanReferUnaccessible
{
    /**
     * Run unaccessible method.
     * If necessary, you can give this method's arguments.
     *
     * @param object $originalInstance
     * @param string $methodName
     * @param array  $args
     * @return mixed
     */
    public function runUnaccessibleMethod(
        object $originalInstance,
        string $methodName,
        array $args = []
    ) {
        $reflection = new ReflectionClass($originalInstance);
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);
        return $method->invokeArgs($originalInstance, $args);
    }

    /**
     * Get unaccessible property.
     *
     * @param object $originalInstance
     * @param string $propertyName
     * @return mixed
     */
    public function getUnaccessibleProperty(object $originalInstance, string $propertyName)
    {
        $reflection = new ReflectionClass($originalInstance);
        $property = $reflection->getProperty($propertyName);
        $property->setAccessible(true);
        return $property->getValue($originalInstance);
    }

    /**
     * Get unaccessible properties.
     *
     * @param object $originalInstance
     * @param array  $propertyNames
     * @return array
     */
    public function getUnaccessibleProperties(object $originalInstance, array $propertyNames): array
    {
        $array = [];
        foreach ($propertyNames as $name) {
            $array[$name] = $this->getUnaccessibleProperty($originalInstance, $name);
        }
        return $array;
    }
}
