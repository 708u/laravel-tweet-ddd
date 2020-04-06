<?php

namespace Domain\Repository\Contract\Tweet;

use Domain\Model\Entity\Tweet\Tweet;
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
     * @param string $id
     * @return Collection
     */
    public function find(string $id): Collection;

    /**
     * Find Tweet entity by userId.
     *
     * @param string $userId
     * @return Collection
     */
    public function findByUserId(string $userId): Collection;
}
