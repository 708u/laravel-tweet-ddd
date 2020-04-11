<?php

namespace Domain\UseCase\Tweet;

use Domain\Model\ValueObject\Tweet\Identifier\UserId;
use Domain\Repository\Contract\Tweet\TweetRepository;
use Domain\Repository\Contract\Tweet\UserRepository;

class ShowHomeUseCase
{
    private UserRepository $user;

    private TweetRepository $tweet;

    public function __construct(
        UserRepository $user,
        TweetRepository $tweet
    ) {
        $this->tweet = $tweet;
        $this->user = $user;
    }

    /**
     * Find User to show its details.
     *
     * @param string $identifier
     * @return array
     */
    public function execute(string $identifier): array
    {
        $userDTO = $this->user->find(new UserId($identifier))->toDTO();

        $feedsDTO = $this->tweet->findByUserId(new UserId($identifier))->toDTO();

        return [$userDTO, $feedsDTO];
    }
}
