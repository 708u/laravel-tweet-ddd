<?php

namespace Tests\Feature\Http\Actions\Verify;

use App\Eloquent\User;
use App\Notifications\VerifyEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

/**
 * @internal
 */
class VerifyActionTest extends TestCase
{
    use RefreshDatabase;

    /**
     *
     * @group verify
     * @return void
     */
    public function testVerifyAction()
    {
        Notification::fake();

        $response = $this->post(
            'signup',
            [
                'email' => 'foo@example.com',
                'name'  => 'foo',
                'password' => $password = 'password',
                'password_confirmation' => $password,
            ]
        );

        $response->assertStatus(302);

        // Assert verify mail was sent
        Notification::assertSentTo(
            $user = User::first(),
            VerifyEmail::class
        );

        // HACK: This test's purpose is to get verification url. Technically, It give us no assertion.
        $verificationUrl = '';
        Notification::assertSentTo(
            $user = User::first(),
            VerifyEmail::class,
            function($notification) use ($user, &$verificationUrl) {
                $verificationUrl = $notification->toMail($user)->actionUrl;;
                return true;
            }
        );

        $response = $this->get($verificationUrl);

        // Assert User was verified.
        $response->assertRedirect();
        $response->assertSessionHas('alert-primary', 'Welcome! Your Account Successfully Confirmed!');
    }
}
