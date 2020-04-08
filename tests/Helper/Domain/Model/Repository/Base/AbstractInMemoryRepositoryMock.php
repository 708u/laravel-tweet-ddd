<?php

namespace Tests\Helper\Domain\Model\Repository\Base;

use Domain\Model\Entity\Base\Entity;
use Domain\Model\ValueObject\Base\Identifier;
use Illuminate\Support\Collection;
use Infrastructure\Repository\Base\InMemoryRepository;

class AbstractInMemoryRepositoryMock extends InMemoryRepository
{
    /**
     * save entity.
     *
     * @param Entity $entity
     * @return void
     */
    public function save(Entity $entity)
    {
        $this->saveInMemory($entity);
    }

    /**
     * find in memory.
     *
     * @param Identifier $identifier
     * @return Entity|null
     */
    public function find(Identifier $identifier): ?Entity
    {
        return $this->findInMemory($identifier);
    }

    /**
     * find by attribute.
     *
     * @param mixed $attribute
     * @param string $methodName
     * @return Collection
     */
    public function findBy($attribute, string $methodName): Collection
    {
        return $this->findByAttributeInMemory($attribute, $methodName);
    }

    /**
     * remove entity.
     *
     * @param Identifier $identifier
     * @return void
     */
    public function remove(Identifier $identifier): void
    {
        $this->removeInMemory($identifier);
    }
}
