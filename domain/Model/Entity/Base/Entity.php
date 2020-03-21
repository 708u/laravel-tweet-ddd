<?php

namespace Domain\Model\Entity\Base;

use Domain\Model\DTO\Base\DTO;
use Domain\Model\ValueObject\Base\Identifier;

abstract class Entity
{
    protected Identifier $identifier;

    /**
     * Must convert Entity into DTO to prevent leaking domain knowledge.
     *
     * @return DTO
     */
    abstract public function toDTO(): DTO;

    /**
     * Determine if entity is completely same one.
     *
     * @param Entity $entity
     * @return bool
     */
    public function equals(Identifier $identifier): bool
    {
        return $this->identifier->equals($identifier);
    }

    /**
     * Get own Identifier
     *
     * @return Identifier
     */
    public function identifier(): Identifier
    {
        return $this->identifier;
    }

    /**
     * Get own Identifier as string
     *
     * @return int
     */
    public function identifierAsString(): string
    {
        return $this->identifier->toString();
    }
}
