<?php

namespace Domain\Repository\Contract\Tweet;

use Domain\Model\Entity\Tweet\User;
use Domain\Model\ValueObject\Tweet\Identifier\UserId;
use Illuminate\Support\Collection;

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
     * @param UserId $userId
     * @return User
     */
    public function find(UserId $userId): User;

    /**
     * Find all user entity.
     *
     * @return Collection
     */
    public function findAll(): Collection;
}
