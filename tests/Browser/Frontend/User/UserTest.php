<?php

namespace Tests\Browser\Frontend\User;

use App\Eloquent\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\Browser\Helper\TestHelper;
use Tests\DuskTestCase;

/**
 * @internal
 */
class UserTest extends DuskTestCase
{
    use DatabaseMigrations, TestHelper;

    /**
     * User page test
     * @group user
     *
     * @return void
     */
    public function testVisitShowingUser()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = factory(User::class)->create())
                    ->visit('/users/' . $user->uuid)
                    ->assertTitle($this->getTitle('User Profile'));
        });
    }
}
