<?php

namespace Tests\Browser\Frontend\Auth;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SignUpTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @group auth
     * @return void
     */
    public function testVisitSignUpPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/signup')
                ->assertRouteIs('frontend.auth.signup');
        });
    }
}
