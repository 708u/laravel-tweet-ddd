<?php

namespace Infrastructure\DomainModelGeneratable\Eloquent\Tweet;

use App\Eloquent\PostedPicture as EloquentPostedPicture;
use Domain\Model\Entity\Tweet\PostedPicture;
use Domain\Model\ValueObject\Tweet\Identifier\PostedPictureId;
use Domain\Model\ValueObject\Tweet\Identifier\TweetId;

trait PostedPictureGeneratable
{
    /**
     * Generate Tweet entity from eloquent
     *
     * @param EloquentPostedPicture $eloquentPostedPicture
     * @return PostedPicture
     */
    private function generatePostedPicture(EloquentPostedPicture $eloquentPostedPicture): PostedPicture
    {
        return new PostedPicture(
            new PostedPictureId($eloquentPostedPicture->uuid),
            new TweetId($eloquentPostedPicture->tweet_uuid),
            $eloquentPostedPicture->name
        );
    }
}
