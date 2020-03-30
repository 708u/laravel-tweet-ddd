<?php

namespace Domain\Query\Contract\Tweet;

use Illuminate\Support\Collection;

interface UserQuery
{
    /**
     * Get All Verified Users.
     *
     * @return Collection
     */
    public function findAllVerifiedUser(): Collection;
}
