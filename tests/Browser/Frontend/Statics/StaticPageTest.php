<?php

namespace Tests\Browser\Frontend\Statics;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class StaticPageTest extends DuskTestCase
{
    /**
     *
     * @group static
     * @return void
     */
    public function testVisitAboutPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/about')
                ->assertRouteIs('frontend.static.about')
                ->assertTitle('About | ' . config('app.name'));
        });
    }

    /**
     *
     * @group static
     * @return void
     */
    public function testVisitHelpPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/help')
                ->assertRouteIs('frontend.static.help')
                ->assertTitle('Help | ' . config('app.name'));
        });
    }
}
