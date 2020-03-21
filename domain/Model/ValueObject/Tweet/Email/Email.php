<?php

namespace Domain\Model\ValueObject\Tweet\Email;

use InvalidArgumentException;

class Email
{
    private string $email;

    private function __construct(string $email)
    {
        $this->validate($email);
        $this->email = $email;
    }

    /**
     * Create Instance.
     *
     * @param string $email
     * @return self
     */
    public static function factory(string $email): self
    {
        self::validate($email);
        return new self($email);
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function email(): string
    {
        return $this->email;
    }

    /**
     * determine if email has collect format.
     *
     * @param string $email
     * @return void
     */
    private static function validate(string $email): void
    {
        throw_unless(
            preg_match("/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/", $email),
            new InvalidArgumentException("Email $email has invalid format.")
        );
    }
}
