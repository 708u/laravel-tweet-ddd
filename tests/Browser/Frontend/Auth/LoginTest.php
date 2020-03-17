<?php

namespace Tests\Browser\Frontend\Auth;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

/**
 * @internal
 */
class LoginPageTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @group auth
     * @return void
     */
    public function testVisitLoginPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->assertSee('Login')
                ->assertRouteIs('frontend.auth.login');
        });
    }
}
