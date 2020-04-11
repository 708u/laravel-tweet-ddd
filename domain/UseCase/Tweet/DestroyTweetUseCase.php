<?php

namespace Domain\UseCase\Tweet;

use Domain\Model\ValueObject\Tweet\Identifier\TweetId;
use Domain\Model\ValueObject\Tweet\Identifier\UserId;
use Domain\Repository\Contract\Tweet\UserRepository;

class DestroyTweetUseCase
{
    private UserRepository $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function execute(string $tweetUuid, string $userUuid)
    {
        $tweetId = new TweetId($tweetUuid);
        $userId = new UserId($userUuid);
        $user = $this->user->find($userId);
    }
}
