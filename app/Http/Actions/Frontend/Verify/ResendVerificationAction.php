<?php

namespace App\Http\Actions\Frontend\Verify;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ResendVerificationAction
{
    /**
     * Resend the email verification notification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return $request->wantsJson()
                        ? new Response('', 204)
                        : redirect()->route('frontend.user.show', ['uuid' => $request->uuid]);
        }

        $request->user()->sendEmailVerificationNotification();

        return $request->wantsJson()
                    ? new Response('', 202)
                    : back()->with('resent', true);
    }
}
