<?php

namespace Domain\UseCase\Tweet;

use Domain\Model\ValueObject\Tweet\Identifier\TweetId;
use Domain\Model\ValueObject\Tweet\Identifier\UserId;
use Domain\Repository\Contract\Tweet\TweetRepository;
use Domain\Repository\Contract\Tweet\UserRepository;
use DomainException;

class DestroyTweetUseCase
{
    private UserRepository $user;

    private TweetRepository $tweet;

    public function __construct(UserRepository $user, TweetRepository $tweet)
    {
        $this->user = $user;
        $this->tweet = $tweet;
    }

    /**
     * Destroy tweet entity
     *
     * @param string $tweetUuid
     * @param string $userUuid
     * @return void
     */
    public function execute(string $tweetUuid, string $userUuid): void
    {
        $user = $this->user->find(new UserId($userUuid));
        $tweet = $this->tweet->find(new TweetId($tweetUuid));

        if (! $user->hasTweet($tweet)) {
            throw new DomainException('You try to delete a tweet owned other users.');
        }

        $this->tweet->remove($tweet);
    }
}
