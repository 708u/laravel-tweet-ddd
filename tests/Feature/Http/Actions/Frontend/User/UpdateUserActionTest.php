<?php

namespace Tests\Feature\Http\Actions\Frontend\User;

use Tests\TestCase;
use App\Eloquent\User;

class UpdateUserActionTest extends TestCase
{
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

        $this->actingAs($user = factory(User::class)->create())
            ->put('/users/12345')
            ->assertStatus(403);
    }
}
