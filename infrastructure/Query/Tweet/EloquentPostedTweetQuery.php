<?php

namespace Infrastructure\Query\Tweet;

use App\Eloquent\PostedPicture;
use App\Eloquent\Tweet;
use Domain\Model\DTO\UI\PostedTweetDTO;
use Domain\Model\ValueObject\Tweet\Identifier\UserId;
use Domain\Query\Contract\Tweet\PostedTweetQuery;
use Infrastructure\DomainModelGeneratable\Eloquent\Tweet\PostedPictureGeneratable;
use Infrastructure\DomainModelGeneratable\Eloquent\Tweet\TweetGeneratable;

class EloquentPostedTweetQuery implements PostedTweetQuery
{
    use TweetGeneratable, PostedPictureGeneratable;

    private Tweet $tweet;

    private PostedPicture $postedPicture;

    public function __construct(Tweet $tweet, PostedPicture $postedPicture)
    {
        $this->tweet = $tweet;
        $this->postedPicture = $postedPicture;
    }

    /**
     * Get All tweets with Posted Pictures.
     *
     * @param UserId $userId
     * @return array
     */
    public function postedTweets(UserId $userId): array
    {
        return $this->tweet::with(['postedPicture'])
            ->postedBy($userId->toString())
            ->latest()
            ->get()
            ->map(function ($tweet) {
                return new PostedTweetDTO(
                    $this->generateTweet($tweet)->toDTO(),
                    $tweet->postedPicture->map(fn ($v) => $this->generatePostedPicture($v)->toDTO())->toArray()
                );
            })
            ->toArray();
    }
}
