<?php

namespace Infrastructure\Query\Tweet;

use Domain\Query\Tweet\UserQuery;
use Illuminate\Foundation\Auth\User as EloquentUser;
use Illuminate\Support\Collection;

class EloquentUserQuery implements UserQuery
{
    public function __construct(EloquentUser $eloquentUser)
    {
        $this->eloquentUser = $eloquentUser;
    }

    public function findAllActivatedUser(): Collection
    {
        //
    }
}
