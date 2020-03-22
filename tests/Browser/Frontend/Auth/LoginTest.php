<?php

namespace Tests\Browser\Frontend\Auth;

use App\Eloquent\User;
use Domain\Application\Contract\Hash\Hashable;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

/**
 * @internal
 */
class LoginPageTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @group auth
     * @return void
     */
    public function testCanLogin()
    {
        $plainPassword = 'password';
        $user = factory(User::class)->create(['password' => app(Hashable::class)->make($plainPassword)]);
        $this->browse(function (Browser $browser) use ($user, $plainPassword) {
            $browser->visit('/login')
                ->assertSee('Login')
                ->assertRouteIs('frontend.auth.login')
                ->type('email', $user->email)
                ->type('password', $plainPassword)
                ->press('Login')
                ->assertRouteIs('frontend.user.show', $user->uuid)
                ->assertSee($flashMessage = 'You are logged in!') // flash message
                ->refresh()
                ->assertDontSee($flashMessage);
        });
    }
}
