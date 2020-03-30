<?php

namespace Infrastructure\Query\Tweet;

use App\Eloquent\User as EloquentUser;
use Domain\Query\Contract\Tweet\UserQuery;
use Illuminate\Support\Collection;
use Infrastructure\DomainModelGeneratable\Eloquent\Tweet\UserGeneratable;

class EloquentUserQuery implements UserQuery
{
    use UserGeneratable;

    private EloquentUser $eloquentUser;

    public function __construct(EloquentUser $eloquentUser)
    {
        $this->eloquentUser = $eloquentUser;
    }

    /**
     * Get All Verified Users.
     *
     * @return Collection
     */
    public function findAllVerifiedUser(): Collection
    {
        return $this->eloquentUser
            ->verified()
            ->get()
            ->map(function ($user) {
                return $this->generateUserFromEloquent($user);
            });
    }
}
