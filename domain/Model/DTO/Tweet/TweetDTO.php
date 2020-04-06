<?php

namespace Domain\Model\DTO\Tweet;

use Domain\Model\DTO\Base\DTO;

class TweetDTO extends DTO
{
    protected string $identifier;

    protected string $userId;

    protected string $tweetContent;

    protected string $timestamp;

    public function __construct(string $tweetId, string $userId, string $tweetContent, string $timestamp)
    {
        $this->identifier = $tweetId;
        $this->userId = $userId;
        $this->tweetContent = $tweetContent;
        $this->timestamp = $timestamp;
    }
}
