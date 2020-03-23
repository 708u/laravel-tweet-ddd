<?php

namespace Infrastructure\Repository\Tweet;

use App\Eloquent\User as EloquentUser;
use Domain\Model\Entity\Tweet\User;
use Domain\Model\ValueObject\Tweet\Email\Email;
use Domain\Model\ValueObject\Tweet\Identifier\UserId;
use Domain\Model\ValueObject\Tweet\Password\HashedPassword;
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

    /**
     * Save user entity.
     *
     * @param User $user
     * @return void
     */
    public function save(User $user): void
    {
        $this->eloquentUser->findOrFail($user->identifierAsString())
            ->fill([
                'name'     => $user->userName(),
                'email'    => $user->email(),
                'password' => $user->hashedPassword(),
            ])->save();
    }

    /**
     * Find user entity.
     *
     * @param string $userId
     * @return User
     */
    public function find(string $userId): User
    {
        $user = $this->eloquentUser->findOrFail($userId);
        return $this->generateUserFromEloquent($user);
    }

    /**
     * Generate eloquent to entity.
     *
     * @param EloquentUser $user
     * @return User
     */
    private function generateUserFromEloquent(EloquentUser $user): User
    {
        return new User(
            new UserId($user->uuid),
            $user->name,
            Email::factory($user->email),
            HashedPassword::factory($user->password),
        );
    }
}
