<?php

namespace Domain\Model\ValueObject\Tweet\ActivationStatus;

use Carbon\CarbonImmutable;

class VerificationStatus
{
    public static function factory(?string $verifiedAt = null)
    {
        return new self($verifiedAt);
    }

    private function __construct(?string $verifiedAt)
    {
        $this->verifiedAt = $verifiedAt ? CarbonImmutable::parse($verifiedAt) : null;
    }

    private ?CarbonImmutable $verifiedAt;

    /**
     * Determine if user is verified.
     *
     * @return bool
     */
    public function verified(): bool
    {
        return ! is_null($this->verifiedAt);
    }

    /**
     * Get formatted verified at.
     *
     * @param string $format
     * @return string
     */
    public function formattedVerifiedAt(string $format): string
    {
        return $this->verifiedAt->format($format);
    }
}
