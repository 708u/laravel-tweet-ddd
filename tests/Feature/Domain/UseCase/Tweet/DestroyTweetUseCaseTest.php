<?php

namespace Tests\Feature\Domain\UseCase\Tweet;

use App\Eloquent\User;
use Domain\Model\ValueObject\Tweet\TweetContent\TweetContent;
use Domain\Repository\Contract\Tweet\TweetRepository;
use Domain\Repository\Contract\Tweet\UserRepository;
use Domain\UseCase\Tweet\DestroyTweetUseCase;
use Infrastructure\DomainModelGeneratable\Eloquent\Tweet\TweetGeneratable;
use Infrastructure\DomainModelGeneratable\Eloquent\Tweet\UserGeneratable;
use Infrastructure\Repository\Tweet\InMemory\InMemoryTweetRepository;
use Infrastructure\Repository\Tweet\InMemory\InMemoryUserRepository;
use Tests\TestCase;

/**
 * @internal
 */
class DestroyTweetUseCaseTest extends TestCase
{
    use UserGeneratable, TweetGeneratable;

    private DestroyTweetUseCase $useCase;

    private UserRepository $user;

    private InMemoryTweetRepository $tweet;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = $this->swap(UserRepository::class, app(InMemoryUserRepository::class));
        $this->tweet = $this->swap(TweetRepository::class, app(InMemoryTweetRepository::class));
        $this->useCase = app(DestroyTweetUseCase::class);
    }

    /**
     * @group usecase
     *
     * @return void
     */
    public function testDestroy()
    {
        $user = $this->generateUserFromEloquent(factory(User::class)->make());
        $this->user->create($user);

        $tweet = $user->tweet(TweetContent::factory('hello world!'));
        $this->tweet->create($tweet);

        // assert tweet was created.
        $this->assertTrue($this->tweet->hasSaved($tweet));

        $this->useCase->execute($tweet->identifierAsString(), $user->identifierAsString());

        // assert tweet was destroyed.
        $this->assertTrue($this->tweet->hasNotSaved($tweet));
    }
}
