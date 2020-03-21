<?php

namespace Domain\Repository\Contract\Tweet;

use Domain\Model\Entity\Tweet\User;

interface UserRepository
{
    /**
     * Create user entity.
     *
     * @param User $user
     * @return void
     */
    public function create(User $user): void;
}
