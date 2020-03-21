<?php

namespace Infrastructure\Repository\Tweet;

use App\Eloquent\User as EloquentUser;
use Domain\Model\Entity\Tweet\User;
use Domain\Repository\Contract\Tweet\UserRepository;

class EloquentUserRepository implements UserRepository
{
    private EloquentUser $eloquentUser;

    public function __construct(EloquentUser $user)
    {
        $this->eloquentUser = $user;
    }

    /**
     * Create User entity.
     *
     * @param User $user
     * @return void
     */
    public function create(User $user): void
    {
        $this->eloquentUser->create([
            'uuid'     => $user->identifierAsString(),
            'name'     => $user->userName(),
            'email'    => $user->email(),
            'password' => $user->hashedPassword(),
        ]);
    }
}
