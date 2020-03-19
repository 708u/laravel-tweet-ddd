<?php

namespace Tests\Helper\Domain\Model\Entity\Base;

use Domain\Model\Entity\Base\Entity;
use Domain\Model\ValueObject\Base\Identifier;

class TestEntity extends Entity
{
    public function __construct(Identifier $identifier)
    {
        $this->identifier = $identifier;
    }
}
