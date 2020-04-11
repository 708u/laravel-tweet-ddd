<?php

namespace Domain\Model\Entity\Tweet;

use Carbon\CarbonImmutable;
use Domain\Application\Contract\Uuid\UuidGeneratable;
use Domain\Model\DTO\Tweet\UserDTO;
use Domain\Model\Entity\Base\Entity;
use Domain\Model\ValueObject\Tweet\ActivationStatus\VerificationStatus;
use Domain\Model\ValueObject\Tweet\Email\Email;
use Domain\Model\ValueObject\Tweet\Identifier\TweetId;
use Domain\Model\ValueObject\Tweet\Identifier\UserId;
use Domain\Model\ValueObject\Tweet\Password\HashedPassword;
use Domain\Model\ValueObject\Tweet\TweetContent\TweetContent;

class User extends Entity
{
    public function __construct(UserId $userId, string $userName, Email $email, HashedPassword $hashedPassword, VerificationStatus $verificationStatus)
    {
        $this->identifier = $userId;
        $this->userName = $userName;
        $this->email = $email;
        $this->hashedPassword = $hashedPassword;
        $this->verificationStatus = $verificationStatus;
    }

    private string $userName;

    private Email $email;

    private HashedPassword $hashedPassword;

    private VerificationStatus $verificationStatus;

    /**
     * Convert entity to DTO.
     *
     * @return UserDTO
     */
    public function toDTO(): UserDTO
    {
        $verifiedAt = $this->verified() ? $this->formattedVerifiedAt() : 'not verified.';
        return new UserDTO($this->identifierAsString(), $this->userName(), $this->email(), $verifiedAt);
    }

    /**
     * Get username.
     *
     * @return string
     */
    public function userName(): string
    {
        return $this->userName;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function email(): string
    {
        return $this->email->email();
    }

    /**
     * Get hashed password.
     *
     * @return string
     */
    public function hashedPassword(): string
    {
        return $this->hashedPassword->hashedPassword();
    }

    /**
     * Determine if user is verified.
     *
     * @return bool
     */
    public function verified(): bool
    {
        return $this->verificationStatus->verified();
    }

    /**
     * Get Formatted verified at.
     *
     * @param string $format
     * @return string
     */
    public function formattedVerifiedAt(string $format = 'Y-m-d hh:ii:ss'): string
    {
        return $this->verificationStatus->verified() ? $this->verificationStatus->formattedVerifiedAt($format) : '';
    }

    /**
     * Change username.
     *
     * @param string $userName
     * @return self
     */
    public function changeName(string $userName): self
    {
        $this->userName = $userName;
        return clone $this;
    }

    /**
     * Change Email.
     *
     * @param Email $email
     * @return self
     */
    public function changeEmail(Email $email): self
    {
        $this->email = $email;
        return clone $this;
    }

    /**
     * Change password
     *
     * @param HashedPassword $password
     * @return self
     */
    public function changeHashedPassword(HashedPassword $password): self
    {
        $this->hashedPassword = $password;
        return clone $this;
    }

    /**
     * Tweet a message
     *
     * @param TweetContent $tweetContent
     * @return Tweet
     */
    public function tweet(TweetContent $tweetContent): Tweet
    {
        return new Tweet(
            new TweetId(resolve(UuidGeneratable::class)->nextIdentifier()),
            $this->identifier(),
            $this->userName(),
            $tweetContent,
            new CarbonImmutable()
        );
    }
}
