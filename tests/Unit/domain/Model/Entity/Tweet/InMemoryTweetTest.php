<?php

namespace Tests\Unit\domain\Model\Entity\Tweet;

use Domain\Application\Contract\Hash\Hashable;
use Domain\Application\Contract\Uuid\UuidGeneratable;
use Domain\Model\Entity\Tweet\User;
use Domain\Model\ValueObject\Tweet\ActivationStatus\VerificationStatus;
use Domain\Model\ValueObject\Tweet\Email\Email;
use Domain\Model\ValueObject\Tweet\Identifier\UserId;
use Domain\Model\ValueObject\Tweet\Password\HashedPassword;
use Domain\Repository\Contract\Tweet\TweetRepository;
use Infrastructure\Repository\Tweet\InMemory\InMemoryTweetRepository;
use Tests\TestCase;

/**
 * @internal
 */
class InMemoryTweetTest extends TestCase
{
    private InMemoryTweetRepository $tweetRepository;

    private User $userEntity;

    public function setUp(): void
    {
        parent::setUp();

        $this->tweetRepository = $this->swap(TweetRepository::class, app(InMemoryTweetRepository::class));
        $this->userEntity = new User(
            new UserId(resolve(UuidGeneratable::class)->nextIdentifier()),
            'foo',
            Email::factory('foo@foo.com'),
            HashedPassword::factory(resolve(Hashable::class)->make('password')),
            VerificationStatus::factory()
        );
    }

    /**
     * @group entity
     *
     * @return void
     */
    public function testCanCreate()
    {
        $tweet = $this->userEntity->tweet('hello world!');

        $this->tweetRepository->create($tweet);

        $this->assertTrue($this->tweetRepository->hasSaved($tweet));
    }
}
