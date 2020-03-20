<?php

namespace Domain\Model\Entity\Tweet;

use Domain\Model\Entity\Base\Entity;
use Domain\Model\ValueObject\Tweet\Identifier\UserId;

class User extends Entity
{
    public function __construct(UserId $userId, string $userName, string $email, string $password)
    {
        $this->identifier = $userId;
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
    }

    private string $userName;

    private string $email;

    private string $password;
}
