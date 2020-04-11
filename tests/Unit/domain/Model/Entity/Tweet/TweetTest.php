<?php

namespace Tests\Unit\domain\Model\Entity\Tweet;

use App\Eloquent\User;
use Domain\Model\ValueObject\Tweet\TweetContent\TweetContent;
use Domain\Repository\Contract\Tweet\TweetRepository;
use Domain\Repository\Contract\Tweet\UserRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Infrastructure\DomainModelGeneratable\Eloquent\Tweet\UserGeneratable;
use Tests\TestCase;

/**
 * @internal
 */
class TweetTest extends TestCase
{
    use RefreshDatabase, UserGeneratable;

    private UserRepository $userRepository;

    private TweetRepository $tweetRepository;

    public function setUp(): void
    {
        parent::setUp();
        $this->userRepository = app(UserRepository::class);
        $this->tweetRepository = app(TweetRepository::class);
    }

    /**
     *
     * @return void
     */
    public function testCanCreate()
    {
        $user = $this->generateUserFromEloquent(factory(User::class)->create());

        $tweet = $user->tweet(TweetContent::factory('hello world!'));

        $this->tweetRepository->create($tweet);

        $this->assertDatabaseHas('tweets', [
            'uuid'      => $tweet->identifierAsString(),
            'user_uuid' => $user->identifierAsString(),
            'content'   => $tweet->tweetContent(),
        ]);
    }
}
