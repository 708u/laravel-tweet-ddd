<?php

namespace Domain\Model\Entity\Tweet;

use Domain\Model\Entity\Base\Entity;
use Domain\Model\ValueObject\Tweet\Email\Email;
use Domain\Model\ValueObject\Tweet\Identifier\UserId;
use Domain\Model\ValueObject\Tweet\Password\HashedPassword;

class User extends Entity
{
    public function __construct(UserId $userId, string $userName, Email $email, HashedPassword $hashedPassword)
    {
        $this->identifier = $userId;
        $this->userName = $userName;
        $this->email = $email;
        $this->hashedPassword = $hashedPassword;
    }

    private string $userName;

    private Email $email;

    private HashedPassword $hashedPassword;

    /**
     * Get username.
     *
     * @return string
     */
    public function userName(): string
    {
        return $this->userName;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function email(): string
    {
        return $this->email->email();
    }

    /**
     * Get hashed password.
     *
     * @return string
     */
    public function hashedPassword(): string
    {
        return $this->hashedPassword->hashedPassword();
    }
}
