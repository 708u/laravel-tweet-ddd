<?php

namespace Domain\Query\Contract\Tweet;

use Domain\Model\ValueObject\Tweet\Identifier\UserId;

interface PostedTweetQuery
{
    /**
     * Get All Tweets.
     *
     * @param UserId $userId
     * @return array
     */
    public function postedTweets(UserId $userId): array;
}
