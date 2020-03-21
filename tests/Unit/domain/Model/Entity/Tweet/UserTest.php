<?php

namespace Tests\Unit\domain\Model\Entity\Tweet;

use Domain\Application\Contract\Hash\Hashable;
use Domain\Application\Contract\Uuid\UuidGeneratable;
use Domain\Model\Entity\Tweet\User;
use Domain\Model\ValueObject\Tweet\Email\Email;
use Domain\Model\ValueObject\Tweet\Identifier\UserId;
use Domain\Model\ValueObject\Tweet\Password\HashedPassword;
use Domain\Repository\Contract\Tweet\UserRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 */
class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCreate()
    {
        $userId = new UserId(resolve(UuidGeneratable::class)->nextIdentifier());
        $password = HashedPassword::factory(resolve(Hashable::class)->make('password'));
        $user = new User($userId, 'foo', Email::factory('foo@foo.com'), $password);
        $repo = app(UserRepository::class);
        $repo->create($user);
        $this->assertDatabaseHas('users', ['email' => $user->email()]);
    }
}
