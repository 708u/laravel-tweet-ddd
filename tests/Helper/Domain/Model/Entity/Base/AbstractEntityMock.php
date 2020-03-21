<?php

namespace Tests\Helper\Domain\Model\Entity\Base;

use Domain\Model\DTO\Base\DTO;
use Domain\Model\Entity\Base\Entity;
use Domain\Model\ValueObject\Base\Identifier;

class AbstractEntityMock extends Entity
{
    public function __construct(Identifier $identifier)
    {
        $this->identifier = $identifier;
    }

    public function toDTO(): DTO
    {
        return new class($this->identifierAsString()) extends DTO {
            public function __construct(string $identifier)
            {
                $this->identifier = $identifier;
            }
        };
    }
}
