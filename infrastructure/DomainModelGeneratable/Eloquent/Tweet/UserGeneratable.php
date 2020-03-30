<?php

namespace Infrastructure\DomainModelGeneratable\Eloquent\Tweet;

use App\Eloquent\User as EloquentUser;
use Domain\Model\Entity\Tweet\User;
use Domain\Model\ValueObject\Tweet\ActivationStatus\VerificationStatus;
use Domain\Model\ValueObject\Tweet\Email\Email;
use Domain\Model\ValueObject\Tweet\Identifier\UserId;
use Domain\Model\ValueObject\Tweet\Password\HashedPassword;

trait UserGeneratable
{
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
            VerificationStatus::factory($user->email_verified_at)
        );
    }
}
