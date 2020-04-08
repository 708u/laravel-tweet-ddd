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
    private array $reflectionInstances = [];

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
        $reflection = $this->buildOrReuseReflectionInstance($originalInstance);
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
        $reflection = $this->buildOrReuseReflectionInstance($originalInstance);
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

    /**
     * Set Reflection class for reuse
     *
     * @param ReflectionClass $reflection
     * @return void
     */
    private function setReflectionInstance(ReflectionClass $reflection): void
    {
        $this->reflectionInstances[$reflection->getName()] = $reflection;
    }

    /**
     * Get or Reuse Reflection instance.
     *
     * @param  object $originalInstance
     * @return ReflectionClass
     */
    private function buildOrReuseReflectionInstance(object $originalInstance): ReflectionClass
    {
        $reflection = $this->reflectionInstances[get_class($originalInstance)] ?? null;
        if (is_null($reflection)) {
            $reflection = new ReflectionClass($originalInstance);
            $this->setReflectionInstance($reflection);
        }
        return $reflection;
    }
}
