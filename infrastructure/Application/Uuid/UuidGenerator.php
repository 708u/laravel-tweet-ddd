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
    public function generate(): string
    {
        return (string) Str::orderedUuid();
    }
}
