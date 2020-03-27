<?php

namespace Tests\Browser\Frontend\Auth;

use App\Eloquent\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
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

            // FIXME: Dirty test, it avoid verify its email via verification route, and should remove dependencies from eloquent.
            $user = User::first();
            $uuid = $user->uuid;
            $user->email_verified_at = now();
            $user->save();

            $browser->visit('/')
                ->assertRouteIs('frontend.user.show', $uuid)
                ->visit('/signup')
                ->assertRouteIs('frontend.user.show', $uuid) // redirect user page if already signed up
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
