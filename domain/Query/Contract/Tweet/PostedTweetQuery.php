<?php

namespace Domain\Query\Contract\Tweet;

use Domain\Model\DTO\UI\PostedTweetDTO;
use Domain\Model\ValueObject\Tweet\Identifier\UserId;

interface PostedTweetQuery
{
    /**
     * Get All Tweets.
     *
     * @param UserId $userId
     * @return PostedTweetDTO
     */
    public function postedTweets(UserId $userId): PostedTweetDTO;
}
