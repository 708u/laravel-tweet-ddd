<?php

namespace Infrastructure\Repository\Tweet\InMemory;

use Domain\Model\Entity\Tweet\Tweet;
use Domain\Model\ValueObject\Tweet\Identifier\TweetId;
use Domain\Model\ValueObject\Tweet\Identifier\UserId;
use Domain\Repository\Contract\Tweet\TweetRepository;
use Illuminate\Support\Collection;
use Infrastructure\Repository\Base\InMemoryRepository;

class InMemoryTweetRepository extends InMemoryRepository implements TweetRepository
{
    /**
     * Create Tweet entity.
     *
     * @param Tweet $tweet
     * @return void
     */
    public function create(Tweet $tweet): void
    {
        $this->saveInMemory($tweet);
    }

    /**
     * Save Tweet entity.
     *
     * @param Tweet $tweet
     * @return void
     */
    public function save(Tweet $tweet): void
    {
        //
    }

    /**
     * Find Tweet entity.
     *
     * @param TweetId $tweetId
     * @return Tweet
     */
    public function find(TweetId $tweetId): Tweet
    {
        return $this->findInMemory($tweetId);
    }

    /**
     * Find Tweet entity by userId.
     *
     * @param UserId $userId
     * @return Collection
     */
    public function findByUserId(UserId $userId): Collection
    {
        return $this->findByAttributeInMemory($userId, 'userId');
    }
}
