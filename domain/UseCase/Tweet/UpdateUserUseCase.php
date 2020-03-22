<?php

namespace Domain\UseCase\Tweet;

use Domain\Model\DTO\Tweet\UserDTO;
use Domain\Repository\Contract\Tweet\UserRepository;

class UpdateUserUseCase
{
    private UserRepository $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * Find User to show its details.
     *
     * @param string $identifier
     * @return void
     */
    public function execute(string $identifier): void
    {
        $user = $this->user->find($identifier);
    }
}
