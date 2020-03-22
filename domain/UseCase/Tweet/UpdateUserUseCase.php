<?php

namespace Domain\UseCase\Tweet;

use Domain\Application\Contract\Hash\Hashable;
use Domain\Model\DTO\Tweet\UserDTO;
use Domain\Model\ValueObject\Tweet\Email\Email;
use Domain\Model\ValueObject\Tweet\Password\HashedPassword;
use Domain\Repository\Contract\Tweet\UserRepository;

class UpdateUserUseCase
{
    private UserRepository $user;

    private Hashable $hash;

    public function __construct(UserRepository $user, Hashable $hash)
    {
        $this->user = $user;
        $this->hash = $hash;
    }

    /**
     * Find User to show its details.
     *
     * @param string $identifier
     * @return UserDTO
     */
    public function execute(string $identifier, string $userName, string $email, string $password): UserDTO
    {
        $user = $this->user->find($identifier)
            ->changeName($userName)
            ->changeEmail(Email::factory($email))
            ->changeHashedPassword(HashedPassword::factory($this->hash->make($password)));

        $this->user->save($user);

        return $user->toDTO();
    }
}
