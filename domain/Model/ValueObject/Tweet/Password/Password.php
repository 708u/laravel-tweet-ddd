<?php

namespace Domain\Model\ValueObject\Tweet\Password;

use InvalidArgumentException;

class Password
{
    private string $password;

    private const HASHED_PASSWORD_LENGTH = 60;

    private function __construct(string $password)
    {
        $this->password = $password;
    }

    public static function factory(string $password): self
    {
        throw_unless(
            strlen($password) === self::HASHED_PASSWORD_LENGTH,
            new InvalidArgumentException('Hashed Password length should 60 chars.')
        );

        return new self($password);
    }

    /**
     * Get Hashed password
     *
     * @return string
     */
    public function hashedPassword(): string
    {
        return $this->password;
    }
}
