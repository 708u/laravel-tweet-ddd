<?php

namespace Domain\Query\Tweet;

use Illuminate\Support\Collection;

interface UserQuery
{
    public function findAllActivatedUser(): Collection;
}
