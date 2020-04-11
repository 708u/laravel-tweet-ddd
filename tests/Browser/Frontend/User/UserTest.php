<?php

namespace Tests\Browser\Frontend\User;

use App\Eloquent\Tweet;
use App\Eloquent\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\Browser\Helper\TestHelper;
use Tests\DuskTestCase;

/**
 * @internal
 */
class UserTest extends DuskTestCase
{
    use DatabaseMigrations, TestHelper;

    /**
     * User page test
     * @group user
     *
     * @return void
     */
    public function testVisitShowingUser()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = factory(User::class)->create())
                    ->visit('/users/' . $user->uuid)
                    ->assertTitle($this->getTitle('User Profile'));
        });
    }

    /**
     * @group user
     *
     * @return void
     */
    public function testVisitShowingUserViaIndex()
    {
        factory(User::class, 28)->create();

        $this->browse(function (Browser $browser) {
            $anotherUser = factory(User::class)->create(); // for visiting profile

            $browser->loginAs(factory(User::class)->create())
                    ->visit('/users')
                    ->assertTitle($this->getTitle('All Users'))
                    ->assertSeeLink($anotherUser->name)
                    ->clickLink($anotherUser->name)
                    ->assertRouteIs('frontend.user.show', ['uuid' => $anotherUser->uuid]);
        });
    }

    /**
     * User index test
     * @group user
     *
     * @return void
     */
    public function testVisitIndexUser()
    {
        factory(User::class, 100)->create();
        $this->browse(function (Browser $browser) {
            $browser->loginAs(factory(User::class)->create())
                    ->visit('/users')
                    ->assertTitle($this->getTitle('All Users'))
                    ->clickLink($paginationLink = 2)
                    ->assertQueryStringHas('page', $paginationLink);
        });
    }

    /**
     * @group user
     *
     * @return void
     */
    public function testCanEditOwnProfile()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = factory(User::class)->create())
                    ->visit('/users/' . $user->uuid . '/edit')
                    ->assertRouteIs('frontend.user.edit', ['uuid' => $user->uuid])
                    ->assertTitle($this->getTitle('Edit Profile'))
                    ->assertSee('Update your profile')
                    ->assertInputValue('name', $user->name) // Form has default value of own params
                    ->assertInputValue('email', $user->email)
                    ->type('name', $newName = 'foobar')
                    ->type('email', $newEmail = 'foobar@example.com')
                    ->type('password', $newPassword = 'aaaaaaaa')
                    ->type('password_confirmation', $newPassword)
                    ->press('Save Changes')
                    ->assertRouteIs('frontend.user.edit', ['uuid' => $user->uuid]) // Determine page redirected
                    ->assertInputValue('name', $newName) // Input Value changed to new name and email
                    ->assertInputValue('email', $newEmail)
                    ->logout()
                    ->visit('/login')
                    ->type('email', $newEmail) // Determine if user can login with using new email and password
                    ->type('password', $newPassword)
                    ->press('Login')
                    ->assertRouteIs('frontend.user.home');
        });
    }

    /**
     * @group user
     * TODO: implement ordered tweet appearance by created_at.
     *
     * @return void
     */
    public function testVisitUserProfile()
    {
        $this->browse(function (Browser $browser) {
            $user = factory(User::class)->create();
            $tweets = factory(Tweet::class, 30)->make();
            $user->tweets()->saveMany($tweets);

            $browser->loginAs($user)
                    ->visit('/users/' . $user->uuid)
                    ->assertRouteIs('frontend.user.show', ['uuid' => $user->uuid])
                    ->assertTitle($this->getTitle('User Profile'))
                    ->assertSee('Tweets (30)')
                    ->assertQueryStringMissing('page'); // pagination not performed cause amount of tweets is 30.
            foreach ($tweets as $tweet) {
                $browser->assertSee($tweet->content);
            }

            // Add tweet over pagination limit.
            $user->tweets()->save(factory(Tweet::class)->make());

            $browser->refresh()
                ->assertSee('Tweets (31)')
                ->clickLink($paginationLink = 2)
                ->assertQueryStringHas('page', $paginationLink);
        });
    }

    /**
     * @group user
     *
     * @return void
     */
    public function testCannotAccessUserEditPageIfUserGiveUrlInvalidUuid()
    {
        $this->browse(function (Browser $browser) {
            $anotherUser = factory(User::class)->create();
            $browser->loginAs(factory(User::class)->create())
                    ->visit('/users/' . $anotherUser->uuid . '/edit')
                    ->assertTitle('Forbidden')
                    ->assertSee('403');
        });
    }
}
