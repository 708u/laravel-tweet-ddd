<?php

namespace Domain\Model\ValueObject\Base;

use Domain\Application\Contract\Uuid\UuidGeneratable;
use DomainException;

abstract class Identifier
{
    private string $identifier;

    public function __construct(string $identifier)
    {
        $this->validate($identifier);
        $this->identifier = $identifier;
    }

    public function __toString(): string
    {
        return (string) $this->identifier;
    }

    /**
     * Determine if identifier is same another.
     *
     * @param self $identifier
     * @return bool
     */
    public function equals(self $identifier): bool
    {
        return $this->identifier === $identifier->toString();
    }

    /**
     * Get identifier as string.
     *
     * @return string
     */
    public function toString(): string
    {
        return $this->identifier;
    }

    /**
     * Determine if parameters is correct formant based on Application Core.
     *
     * @throws DomainException
     * @return void
     */
    private function validate(string $identifier): void
    {
        throw_unless(
            resolve(UuidGeneratable::class)->isUuid($identifier),
            new DomainException("The argument of $identifier is NOT UUID.")
        );
    }
}
