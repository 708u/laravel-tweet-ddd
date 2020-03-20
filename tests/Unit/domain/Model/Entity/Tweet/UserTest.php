<?php

namespace Tests\Unit\domain\Model\Entity\Tweet;

use Domain\Application\Contract\Uuid\UuidGeneratable;
use Domain\Model\Entity\Tweet\User;
use Domain\Model\ValueObject\Tweet\Identifier\UserId;
use Tests\TestCase;

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
        $user = new User($userId, 'foo', 'foo@foo.com', 'password');
        $this->assertNotEmpty($user);
    }
}
