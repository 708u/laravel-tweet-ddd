<?php

namespace Domain\Application\Contract\Uuid;

interface UuidGeneratable
{
    /**
     * Generate UUID v4 with timestamps.
     *
     * @return string
     */
    public function nextIdentifier(): string;

    /**
     * determine if value is uuid.
     *
     * @param string $str
     * @return bool
     */
    public function isUuid(string $str): bool;
}
