<?php

namespace Infrastructure\Repository\Tweet\InMemory;

use Domain\Model\Entity\Tweet\User;
use Domain\Repository\Contract\Tweet\UserRepository;
use Illuminate\Support\Collection;
use Infrastructure\Repository\Base\InMemoryRepository;

class InMemoryUserRepository extends InMemoryRepository implements UserRepository
{
    /**
     * Create user entity.
     *
     * @param User $user
     * @return void
     */
    public function create(User $user): void
    {
        $this->saveInMemory($user);
    }

    /**
     * Save user entity.
     *
     * @param User $user
     * @return void
     */
    public function save(User $user): void
    {
        $this->saveInMemory($user);
    }

    /**
     * Find user entity.
     *
     * @param string $userId
     * @return User
     */
    public function find(string $userId): User
    {
        $this->findInMemory($userId);
    }

    /**
     * Find all user entity.
     *
     * @return Collection
     */
    public function findAll(): Collection
    {
        return $this->findAllInMemory();
    }
}
