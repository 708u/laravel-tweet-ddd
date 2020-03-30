<?php

namespace Domain\UseCase\Tweet;

use Domain\Query\Contract\Tweet\UserQuery;
use Illuminate\Support\Collection;

class IndexUserUseCase
{
    private UserQuery $userQuery;

    public function __construct(UserQuery $userQuery)
    {
        $this->userQuery = $userQuery;
    }

    /**
     * Find User to show its details.
     *
     * @param string $identifier
     * @return Collection
     */
    public function execute(): Collection
    {
        return $this->userQuery
            ->findAllVerifiedUser()
            ->map(function ($user) {
                return $user->toDTO();
            });
    }
}
