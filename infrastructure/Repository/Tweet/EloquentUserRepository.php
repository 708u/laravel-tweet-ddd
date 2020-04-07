<?php

namespace Infrastructure\Repository\Tweet;

use App\Eloquent\User as EloquentUser;
use Domain\Model\Entity\Tweet\User;
use Domain\Model\ValueObject\Tweet\Identifier\UserId;
use Domain\Repository\Contract\Tweet\UserRepository;
use Illuminate\Support\Collection;
use Infrastructure\DomainModelGeneratable\Eloquent\Tweet\UserGeneratable;

class EloquentUserRepository implements UserRepository
{
    use UserGeneratable;

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
        $this->eloquentUser->insert([
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
     * Find all user entity.
     *
     * @return Collection
     */
    public function findAll(): Collection
    {
        return $this->eloquentUser->all()
            ->map(function ($user) {
                return $this->generateUserFromEloquent($user);
            });
    }
}
