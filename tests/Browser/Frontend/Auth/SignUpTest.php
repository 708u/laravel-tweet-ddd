<?php

namespace Tests\Browser\Frontend\Auth;

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
                ->assertRouteIs('frontend.user.home')
                ->assertAuthenticated()
                ->visit('/signup')
                ->assertRouteIs('frontend.user.home') // redirect home if already signed up
                ->visit('/login')
                ->assertRouteIs('frontend.user.home'); // also redirect home if already signed up
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
