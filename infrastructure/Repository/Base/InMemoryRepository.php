<?php

namespace Infrastructure\Repository\Base;

use Domain\Model\Entity\Base\Entity;
use Domain\Model\ValueObject\Base\Identifier;
use Illuminate\Support\Collection;

abstract class InMemoryRepository
{
    protected array $repository = [];

    /**
     * Determine if entity was saved in memory.
     *
     * @param Entity $entity
     * @return bool
     */
    public function hasSaved(Entity $entity): bool
    {
        return ! is_null($this->repository[static::class][$entity->identifierAsString()] ?? null);
    }

    /**
     * Determine if entity was NOT saved in memory.
     *
     * @param Entity $entity
     * @return bool
     */
    public function hasNotSaved(Entity $entity): bool
    {
        return ! $this->hasSaved($entity);
    }

    /**
     * save entity in memory that php's array
     *
     * @param Entity $entity
     * @return Entity
     */
    protected function saveInMemory(Entity $entity): Entity
    {
        $this->repository[static::class][$entity->identifierAsString()] = $entity;

        return $entity;
    }

    /**
     * find entity in memory.
     *
     * @param Identifier $identifier
     * @return Entity|null
     */
    protected function findInMemory(Identifier $identifier): ?Entity
    {
        return $this->repository[static::class][$identifier->toString()] ?? null;
    }

    /**
     * find all entities in memory.
     *
     * @return Collection
     */
    protected function findAllInMemory(): Collection
    {
        return collect($this->repository[static::class]);
    }

    /**
     * find entity has specific attribute in memory repository.
     *
     * @param mixed $attribute
     * @param string $getterMethod
     * @return Collection
     */
    protected function findByAttributeInMemory($attribute, string $getterMethod): Collection
    {
        $foundEntities = collect();

        foreach ($this->repository[static::class] as $entity) {
            if (! method_exists($entity, $getterMethod)) {
                continue;
            }

            if (method_exists($attribute, 'equals')) {
                $attribute->equals($entity->$getterMethod()) && $foundEntities[] = $entity;
            } elseif ($attribute === $entity->$getterMethod()) {
                $foundEntities[] = $entity;
            }
        }

        return $foundEntities;
    }

    /**
     * Remove entity in memory.
     *
     * @param Identifier $identifier
     * @return void
     */
    protected function removeInMemory(Identifier $identifier): void
    {
        unset($this->repository[static::class][$identifier->toString()]);
    }
}
