<?php

namespace Tests\Feature\Http\Actions\Frontend\User;

use App\Eloquent\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 */
class UpdateUserActionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @group user
     *
     * @return void
     */
    public function testCannotPutUserUpdateAction()
    {
        $this->actingAs($user = factory(User::class)->create())
            ->put('/users/' . $user->uuid)
            ->assertStatus(302);

        $anotherUser = factory(User::class)->create();
        $this->actingAs($user)
            ->put('/users/' . $anotherUser->uuid)
            ->assertForbidden();
    }
}
