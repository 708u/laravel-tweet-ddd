<?php

namespace Tests\Browser\Frontend\Auth;

use App\Eloquent\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

/**
 * @internal
 */
class SignUpTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @group auth
     * @return void
     */
    public function testCanSignUpPage()
    {
        $name = 'foobar';
        $email = 'foobar@example.com';
        $password = '123456789';
        $this->browse(function (Browser $browser) use ($name, $email, $password) {
            $browser->visit('/signup')
                ->assertRouteIs('frontend.auth.signup')
                ->type('name', $name)
                ->type('email', $email)
                ->type('password', $password)
                ->type('password_confirmation', $password)
                ->press('Register')
                ->assertRouteIs('frontend.verification.notice')
                ->assertAuthenticated();

            $flashMessage = 'Welcome! Your Account Successfully Confirmed!';
            $uuid = User::first()->uuid; // FIXME: should remove dependencies

            $browser->visit('email/verify/' . $uuid .'/' . sha1($email))
                ->assertRouteIs('frontend.user.show', $uuid)
                ->assertSee($flashMessage) // welcome flash message
                ->visit('/signup')
                ->assertRouteIs('frontend.user.show', $uuid) // redirect user page if already signed up
                ->assertDontSee($flashMessage) // flash message disappeared
                ->visit('/login')
                ->assertRouteIs('frontend.user.show', $uuid); // also redirect user page if already signed up
        });

        $this->assertDatabaseHas(
            'users',
            [
                'name'  => $name,
                'email' => $email,
            ]
        );
    }
}
