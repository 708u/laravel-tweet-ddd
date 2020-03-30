<?php

namespace Domain\Model\DTO\Tweet;

use Domain\Model\DTO\Base\DTO;

class UserDTO extends DTO
{
    public function __construct(string $userId, string $userName, string $email, string $verifiedAt)
    {
        $this->identifier = $userId;
        $this->userName = $userName;
        $this->email = $email;
        $this->verifiedAt = $verifiedAt;
    }

    protected string $userName;

    protected string $email;

    protected string $verifiedAt;
}
