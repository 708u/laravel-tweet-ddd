<?php

namespace Infrastructure\Query\Tweet;

use App\Eloquent\PostedPicture;
use App\Eloquent\Tweet;
use Domain\Model\DTO\UI\PostedTweetDTO;
use Domain\Model\ValueObject\Tweet\Identifier\UserId;
use Domain\Query\Contract\Tweet\PostedTweetQuery;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Infrastructure\DomainModelGeneratable\Eloquent\Tweet\PostedPictureGeneratable;
use Infrastructure\DomainModelGeneratable\Eloquent\Tweet\TweetGeneratable;

class EloquentS3PostedTweetQuery implements PostedTweetQuery
{
    use TweetGeneratable, PostedPictureGeneratable;

    private Tweet $tweet;

    private PostedPicture $postedPicture;

    private Filesystem $storage;

    public function __construct(Tweet $tweet, PostedPicture $postedPicture)
    {
        $this->tweet = $tweet;
        $this->postedPicture = $postedPicture;
        $this->storage = Storage::disk('s3');
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
                $postedPictureDTOs = [];
                if ($tweet->postedPicture->isNotEmpty()) {
                    foreach ($tweet->postedPicture as $postedPicture) {
                        $postedPictureDTOs[] = $this->generatePostedPicture($postedPicture)->toDTO();
                    }
                }
                $tweetDTO = $this->generateTweet($tweet)->toDTO();
                return new PostedTweetDTO($tweetDTO, $postedPictureDTOs);
            })
            ->toArray();
    }
}
