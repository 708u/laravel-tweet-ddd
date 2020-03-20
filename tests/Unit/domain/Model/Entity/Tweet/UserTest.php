<?php

namespace Tests\Unit\domain\Model\Entity\Tweet;

use Tests\TestCase;
use Domain\Model\Entity\Tweet\User;
use Domain\Application\Contract\Uuid\UuidGeneratable;
use Domain\Model\ValueObject\Tweet\Identifier\UserId;



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
        $user = new User($userId);
        $this->assertNotEmpty($user);
    }
}
