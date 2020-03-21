<?php

namespace Domain\Model\ValueObject\Tweet\Password;

use InvalidArgumentException;

class Password
{
    private string $password;

    private const AT_LEAST_PASSWORD_LENGTH = 8;

    private function __construct(string $password)
    {
        $this->password = $password;
    }

    public static function factory(string $password): self
    {
        throw_if(
            strlen($password) < self::AT_LEAST_PASSWORD_LENGTH,
            new InvalidArgumentException('Password char at least longer than 8.')
        );

        return new self($password);
    }
}
