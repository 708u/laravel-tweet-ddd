<?php

namespace Domain\Query\Tweet;

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
