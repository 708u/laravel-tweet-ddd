<?php

namespace Domain\UseCase\Tweet;

use Domain\Model\DTO\Tweet\UserDTO;
use Domain\Repository\Contract\Tweet\UserRepository;

class ShowUserUseCase
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
     * @return UserDTO
     */
    public function execute(string $identifier): UserDTO
    {
        return $this->user->find($identifier)->toDto();
    }
}
