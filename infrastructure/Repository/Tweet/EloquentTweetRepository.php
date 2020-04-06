<?php

namespace Infrastructure\Repository\Tweet;

use App\Eloquent\Tweet as EloquentTweet;
use Domain\Model\Entity\Tweet\Tweet;
use Domain\Repository\Contract\Tweet\TweetRepository;
use Illuminate\Support\Collection;

class EloquentTweetRepository implements TweetRepository
{
    private EloquentTweet $eloquentTweet;

    public function __construct(EloquentTweet $eloquentTweet)
    {
        $this->eloquentTweet = $eloquentTweet;
    }

    /**
     * Create Tweet entity.
     *
     * @param Tweet $tweet
     * @return void
     */
    public function create(Tweet $tweet): void
    {
        //
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
     * @param string $id
     * @return Collection
     */
    public function find(string $id): Collection
    {
        //
    }

    /**
     * Find Tweet entity by userId.
     *
     * @param string $userId
     * @return Collection
     */
    public function findByUserId(string $userId): Collection
    {
        //
    }
}
