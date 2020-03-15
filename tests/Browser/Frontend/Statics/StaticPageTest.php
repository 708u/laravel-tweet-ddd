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
    public function testVisitHomePage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertRouteIs('frontend.static.home')
                ->assertTitle($this->getTitle('Home'));
        });
    }

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
                ->assertTitle($this->getTitle('About'));
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
                ->assertTitle($this->getTitle('Help'));
        });
    }

    /**
     * get title string
     *
     * @param string $title
     * @return string
     */
    private function getTitle(string $title): string
    {
        $appName = config('app.name');
        return "$title | $appName";
    }
}