<?php

namespace Tests\Browser\Frontend\Statics;

use Laravel\Dusk\Browser;
use Tests\Browser\Helper\TestHelper;
use Tests\DuskTestCase;

/**
 * @internal
 */
class StaticPageTest extends DuskTestCase
{
    use TestHelper;

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
            $browser->visit('/')
                ->clickLink('About')
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
            $browser->visit('/')
                ->clickLink('Help')
                ->assertRouteIs('frontend.static.help')
                ->assertTitle($this->getTitle('Help'));
        });
    }
}
