<?php

namespace Domain\UseCase\Tweet;

use Domain\Model\ValueObject\Tweet\Identifier\UserId;
use Domain\Model\ValueObject\Tweet\TweetContent\TweetContent;
use Domain\Repository\Contract\Tweet\PostedPictureRepository;
use Domain\Repository\Contract\Tweet\TweetRepository;
use Domain\Repository\Contract\Tweet\UserRepository;

class CreateTweetUseCase
{
    private UserRepository $user;

    private TweetRepository $tweet;

    private PostedPictureRepository $postedPicture;

    public function __construct(
        UserRepository $user,
        TweetRepository $tweet,
        PostedPictureRepository $postedPicture
    ) {
        $this->user = $user;
        $this->tweet = $tweet;
        $this->postedPicture = $postedPicture;
    }

    /**
     * Create Tweet Entity.
     *
     * @param UserId $userId
     * @return void
     */
    public function execute(UserId $userId, TweetContent $tweetContent, array $postedPictures = []): void
    {
        $user = $this->user->find($userId);
        $tweet = $user->tweet($tweetContent);
        $this->tweet->create($tweet);

        if (! empty($postedPictures)) {
            $postedPicture = $tweet->postPicture($postedPictures['originalName'], $postedPictures['temporaryPath']);
            $this->postedPicture->save($postedPicture);
        }
    }
}
