<?php

namespace Domain\Model\ValueObject\Tweet\Password;

use InvalidArgumentException;

class HashedPassword
{
    private string $hashedPassword;

    private const HASHED_PASSWORD_LENGTH = 60;

    private function __construct(string $hashedPassword)
    {
        $this->hashedPassword = $hashedPassword;
    }

    public static function factory(string $hashedPassword): self
    {
        throw_unless(
            strlen($hashedPassword) === self::HASHED_PASSWORD_LENGTH,
            new InvalidArgumentException('Hashed Password length should be 60 chars.')
        );

        return new self($hashedPassword);
    }

    /**
     * Get Hashed password
     *
     * @return string
     */
    public function hashedPassword(): string
    {
        return $this->hashedPassword;
    }
}
