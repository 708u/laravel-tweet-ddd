<?php

namespace Domain\Model\Entity\Tweet;

use Carbon\CarbonImmutable;
use Domain\Model\DTO\Base\DTO;
use Domain\Model\DTO\Tweet\TweetDTO;
use Domain\Model\Entity\Base\Entity;
use Domain\Model\ValueObject\Tweet\Identifier\TweetId;
use Domain\Model\ValueObject\Tweet\Identifier\UserId;
use Domain\Model\ValueObject\Tweet\TweetContent\TweetContent;

class Tweet extends Entity
{
    private UserId $userId;

    private TweetContent $tweetContent;

    private CarbonImmutable $timestamp;

    public function __construct(
        TweetId $tweetId, UserId $userId, TweetContent $tweetContent, CarbonImmutable $timestamp
    ) {
        $this->identifier = $tweetId;
        $this->userId = $userId;
        $this->tweetContent = $tweetContent;
        $this->timestamp = $timestamp;
    }

    /**
     * generate entity to DTO.
     *
     * @return TweetDTO
     */
    public function toDTO(): TweetDTO
    {
        return new TweetDTO(
            $this->identifierAsString(),
            $this->userId->toString(),
            $this->tweetContent(),
            $this->timestamp
        );
    }

    /**
     * get user id
     *
     * @return UserId
     */
    public function userId(): UserId
    {
        return $this->userId;
    }

    /**
     * get tweet content.
     *
     * @return string
     */
    public function tweetContent(): string
    {
        return $this->tweetContent->content();
    }
}
