<?php

namespace Infrastructure\Repository\Tweet;

use App\Eloquent\Tweet as EloquentTweet;
use Domain\Model\Entity\Tweet\Tweet;
use Domain\Model\ValueObject\Tweet\Identifier\TweetId;
use Domain\Model\ValueObject\Tweet\Identifier\UserId;
use Domain\Repository\Contract\Tweet\TweetRepository;
use Illuminate\Support\Collection;
use Infrastructure\DomainModelGeneratable\Eloquent\Tweet\TweetGeneratable;

class EloquentTweetRepository implements TweetRepository
{
    use TweetGeneratable;

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
        $this->eloquentTweet->insert([
            'uuid'       => $tweet->identifierAsString(),
            'user_uuid'  => $tweet->userId()->toString(),
            'content'    => $tweet->tweetContent(),
            'created_at' => $tweet->timestamp(),
            'updated_at' => $tweet->timestamp(),
        ]);
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
        $eloquentTweet = $this->eloquentTweet->findOrFail($tweetId->toString());

        return $this->generateTweet($eloquentTweet);
    }

    /**
     * Find Tweet entity by userId.
     *
     * @param UserId $userId
     * @return Collection
     */
    public function findByUserId(UserId $userId): Collection
    {
        return $this->eloquentTweet::with(['user'])
            ->where('user_uuid', $userId)
            ->get()
            ->map(function ($tweet) {
                return $this->generateTweet($tweet);
            });
    }

    /**
     * Remove tweet entity.
     *
     * @param Tweet $tweet
     * @return void
     */
    public function remove(Tweet $tweet): void
    {
        $this->eloquentTweet->destroy($tweet->identifierAsString());
    }
}
