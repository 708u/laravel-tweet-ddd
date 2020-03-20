<?php

namespace Domain\Model\Entity\Tweet;

use Domain\Model\Entity\Base\Entity;
use Domain\Model\ValueObject\Tweet\Identifier\UserId;

class User extends Entity
{
    public function __construct(UserId $userId)
    {
        $this->identifier = $userId;
    }
}
