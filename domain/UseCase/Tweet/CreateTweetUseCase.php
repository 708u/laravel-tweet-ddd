<?php

namespace Domain\UseCase\Tweet;

use Domain\Model\ValueObject\Tweet\Identifier\UserId;
use Domain\Model\ValueObject\Tweet\TweetContent\TweetContent;
use Domain\Repository\Contract\Tweet\TweetRepository;
use Domain\Repository\Contract\Tweet\UserRepository;

class CreateTweetUseCase
{
    private UserRepository $user;

    private TweetRepository $tweet;

    public function __construct(
        UserRepository $user,
        TweetRepository $tweet
    ) {
        $this->user = $user;
        $this->tweet = $tweet;
    }

    /**
     * Create Tweet Entity.
     *
     * @param UserId $userId
     * @return void
     */
    public function execute(UserId $userId, TweetContent $tweetContent): void
    {
        $user = $this->user->find($userId);
        $tweet = $user->tweet($tweetContent);
        $this->tweet->create($tweet);
    }
}
