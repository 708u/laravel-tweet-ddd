<?php

namespace Domain\Repository\Contract\Tweet;

use Domain\Model\Entity\Tweet\Tweet;
use Domain\Model\ValueObject\Tweet\Identifier\TweetId;
use Domain\Model\ValueObject\Tweet\Identifier\UserId;
use Illuminate\Support\Collection;

interface TweetRepository
{
    /**
     * Create Tweet entity.
     *
     * @param Tweet $tweet
     * @return void
     */
    public function create(Tweet $tweet): void;

    /**
     * Save Tweet entity.
     *
     * @param Tweet $tweet
     * @return void
     */
    public function save(Tweet $tweet): void;

    /**
     * Find Tweet entity.
     *
     * @param TweetId $tweetId
     * @return Tweet
     */
    public function find(TweetId $tweetId): Tweet;

    /**
     * Find Tweet entity by userId.
     *
     * @param UserId $userId
     * @return Collection
     */
    public function findByUserId(UserId $userId): Collection;

    /**
     * Remove tweet entity.
     *
     * @param Tweet $tweet
     * @return void
     */
    public function remove(Tweet $tweet): void;
}
