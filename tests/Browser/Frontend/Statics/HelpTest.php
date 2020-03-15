<?php

namespace Tests\Browser\Frontend\Statics;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class HelpTest extends DuskTestCase
{
    /**
     * A Dusk test example.
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
