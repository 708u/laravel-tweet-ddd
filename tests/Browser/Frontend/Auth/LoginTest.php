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
    public function testCanLoginToLogout()
    {
        $plainPassword = 'password';
        $user = factory(User::class)->create(['password' => app(Hashable::class)->make($plainPassword)]);
        $this->browse(function (Browser $browser) use ($user, $plainPassword) {
            $browser->visit('/login')
                ->assertSeeLink('Home') // Can see dropdown menu before log in.
                ->assertSeeLink('Help')
                ->assertSeeLink('Login')
                ->assertSeeLink('About')
                ->assertSee('LOGIN') // Upper case
                ->assertRouteIs('frontend.auth.login')
                ->assertSeeLink('Sign up now!')
                ->type('email', $user->email)
                ->type('password', $plainPassword)
                ->press('LOGIN')
                ->assertRouteIs('frontend.user.home')
                ->assertSeeLink('Profile') // Can see dropdown menu after logged in.
                ->assertSeeLink('Settings')
                ->assertSeeLink('Logout')
                ->clickLink('Logout')
                ->assertRouteIs('frontend.auth.login')
                ->assertGuest(); // Determine if User has already logged out.
        });
    }
}
