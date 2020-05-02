<?php

namespace Infrastructure\DomainModelGeneratable\Eloquent\Tweet;

use App\Eloquent\Tweet as EloquentTweet;
use Carbon\CarbonImmutable;
use Domain\Model\Entity\Tweet\Tweet;
use Domain\Model\ValueObject\Tweet\Identifier\TweetId;
use Domain\Model\ValueObject\Tweet\Identifier\UserId;
use Domain\Model\ValueObject\Tweet\TweetContent\TweetContent;

trait TweetGeneratable
{
    use PostedPictureGeneratable;

    /**
     * Generate Tweet entity from eloquent
     *
     * @param EloquentTweet $eloquentTweet
     * @return Tweet
     */
    private function generateTweet(EloquentTweet $eloquentTweet): Tweet
    {
        $postedPictures = isset($eloquentTweet->postedPicture)
            ? $eloquentTweet->postedPicture->map(fn ($v) => $this->generatePostedPicture($v))->toArray()
            : [];

        return new Tweet(
            new TweetId($eloquentTweet->uuid),
            new UserId($eloquentTweet->user_uuid),
            $eloquentTweet->user->name,
            TweetContent::factory($eloquentTweet->content),
            new CarbonImmutable($eloquentTweet->created_at),
            $postedPictures
        );
    }
}
