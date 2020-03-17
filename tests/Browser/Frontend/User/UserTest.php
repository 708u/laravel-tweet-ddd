<?php

namespace Tests\Browser\Frontend\User;

use App\Eloquent\User;
use Tests\Browser\Helper\TestHelper;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends DuskTestCase
{
    use DatabaseMigrations, TestHelper;

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testVisitShowingUser()
    {
        $this->browse(function (Browser $browser) {

            $browser->loginAs($user = factory(User::class)->create())
                    ->visit('/users/' . $user->id)
                    ->assertTitle($this->getTitle('User Profile'));
        });
    }
}
