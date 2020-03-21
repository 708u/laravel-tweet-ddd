<?php

namespace Domain\Model\Entity\Tweet;

use Domain\Model\Entity\Base\Entity;
use Domain\Model\ValueObject\Tweet\Email\Email;
use Domain\Model\ValueObject\Tweet\Identifier\UserId;
use Domain\Model\ValueObject\Tweet\Password\Password;

class User extends Entity
{
    public function __construct(UserId $userId, string $userName, Email $email, Password $password)
    {
        $this->identifier = $userId;
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
    }

    private string $userName;

    private Email $email;

    private password $password;

    public function userName(): string
    {
        return $this->userName;
    }

    public function email(): string
    {
        return $this->email->email();
    }

    public function hashedPassword(): string
    {
        return $this->password->hashedPassword();
    }
}
