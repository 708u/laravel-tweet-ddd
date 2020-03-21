<?php

namespace Tests\Unit\domain\Model\Entity\Tweet;

use Tests\TestCase;
use Domain\Model\Entity\Tweet\User;
use Domain\Application\Contract\Hash\Hashable;
use Domain\Model\ValueObject\Tweet\Email\Email;
use Domain\Application\Contract\Uuid\UuidGeneratable;
use Domain\Model\ValueObject\Tweet\Identifier\UserId;
use Domain\Model\ValueObject\Tweet\Password\HashedPassword;

/**
 * @internal
 */
class UserTest extends TestCase
{
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
        $this->assertNotEmpty($user);
    }
}
