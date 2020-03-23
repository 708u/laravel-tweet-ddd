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

    /**
     * Save user entity.
     *
     * @param User $user
     * @return void
     */
    public function save(User $user): void;

    /**
     * Find user entity.
     *
     * @param string $userId
     * @return User
     */
    public function find(string $userId): User;
}
