<?php

namespace Domain\Application\Contract\Uuid;

interface UuidGeneratable
{
    /**
     * Generate UUID v4 with timestamps.
     *
     * @return string
     */
    public function generate(): string;
}
