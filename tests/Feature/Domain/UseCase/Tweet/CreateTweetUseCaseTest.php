<?php

namespace Tests\Feature\Domain\UseCase\Tweet;

use App\Eloquent\User;
use Domain\Model\ValueObject\Tweet\TweetContent\TweetContent;
use Domain\Repository\Contract\Tweet\TweetRepository;
use Domain\Repository\Contract\Tweet\UserRepository;
use Domain\UseCase\Tweet\CreateTweetUseCase;
use Illuminate\Support\Str;
use Infrastructure\DomainModelGeneratable\Eloquent\Tweet\TweetGeneratable;
use Infrastructure\DomainModelGeneratable\Eloquent\Tweet\UserGeneratable;
use Infrastructure\Repository\Tweet\InMemory\InMemoryTweetRepository;
use Infrastructure\Repository\Tweet\InMemory\InMemoryUserRepository;
use InvalidArgumentException;
use Tests\TestCase;

/**
 * @internal
 */
class CreateTweetUseCaseTest extends TestCase
{
    use UserGeneratable, TweetGeneratable;

    private CreateTweetUseCase $useCase;

    private UserRepository $user;

    private InMemoryTweetRepository $tweet;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = $this->swap(UserRepository::class, app(InMemoryUserRepository::class));
        $this->tweet = $this->swap(TweetRepository::class, app(InMemoryTweetRepository::class));
        $this->useCase = app(CreateTweetUseCase::class);
    }

    /**
     * @group usecase
     *
     * @return void
     */
    public function testTweet()
    {
        $user = $this->generateUserFromEloquent(factory(User::class)->make());
        $this->user->save($user);

        $this->useCase->execute($user->identifier(), TweetContent::factory('hello world!'));

        $createdTweet = $this->tweet->findByUserId($user->identifier())->first();

        // assert tweet was created.
        $this->assertTrue($this->tweet->hasSaved($createdTweet));
    }

    /**
     * @group usecase
     *
     * @return void
     */
    public function testFailToTweetIfContentAmountOver141()
    {
        $user = $this->generateUserFromEloquent(factory(User::class)->make());
        $this->user->save($user);

        // Should throw exception
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Tweet content length should be less than 140 chars.');

        $this->useCase->execute($user->identifier(), TweetContent::factory(Str::random(141)));
    }
}
