<?php

namespace Domain\Model\Entity\Tweet;

use Carbon\CarbonImmutable;
use Domain\Model\Entity\Base\Entity;
use Domain\Model\ValueObject\Tweet\Identifier\TweetId;
use Domain\Model\ValueObject\Tweet\Identifier\UserId;
use Domain\Model\ValueObject\Tweet\TweetContent\TweetContent;

class Tweet extends Entity
{
    private TweetContent $tweetContent;

    private UserId $userId;

    private CarbonImmutable $timestamp;

    public function __construct(
        TweetId $tweetId, TweetContent $tweetContent, CarbonImmutable $timestamp, UserId $userId
    ) {
        $this->identifier = $tweetId;
        $this->tweetContent = $tweetContent;
        $this->timestamp = $timestamp;
        $this->userId = $userId;
    }
}
