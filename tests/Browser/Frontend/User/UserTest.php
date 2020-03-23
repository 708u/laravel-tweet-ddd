<?php

namespace Tests\Browser\Frontend\User;

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
                    ->assertRouteIs('frontend.user.show', ['uuid' => $user->uuid]);
        });
    }

    /**
     * @group user
     *
     * @return void
     */
    public function testCannotAccessUserEditPageIfYourDontHaveUuidUsedInUrl()
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
