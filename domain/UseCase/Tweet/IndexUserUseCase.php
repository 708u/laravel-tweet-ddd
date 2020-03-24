<?php

namespace Domain\UseCase\Tweet;

use Domain\Model\DTO\Tweet\UserDTO;
use Domain\Repository\Contract\Tweet\UserRepository;
use Illuminate\Support\Collection;

class IndexUserUseCase
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
     * @return Collection
     */
    public function execute(): Collection
    {
        return $this->user
            ->findAll()
            ->map(function ($user) {
                return $user->toDTO();
            });
    }
}
