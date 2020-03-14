<?php

namespace Tests\Browser\Frontend;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AboutPageTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @group static
     * @return void
     */
    public function testVisitAboutPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/about')
                    ->assertTitle('About');
        });
    }
}
