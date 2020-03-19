<?php

namespace Infrastructure\Application\Uuid;

use Domain\Application\Contract\Uuid\UuidGeneratable;
use Illuminate\Support\Str;

class UuidGenerator implements UuidGeneratable
{
    /**
     * Generate UUID v4 with timestamps.
     *
     * @return string
     */
    public function nextIdentifier(): string
    {
        return (string) Str::orderedUuid();
    }

    /**
     * determine if value is uuid.
     *
     * @param string $str
     * @return bool
     */
    public function isUuid(string $str): bool
    {
        return Str::isUuid($str);
    }
}
