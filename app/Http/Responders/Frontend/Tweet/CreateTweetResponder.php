<?php

namespace App\Http\Responders\Frontend\Tweet;

use Illuminate\Http\RedirectResponse;

class CreateTweetResponder
{
    /**
     * redirect to home page.
     *
     * @return RedirectResponse
     */
    public function toResponse(): RedirectResponse
    {
        return redirect()
            ->route('frontend.user.home')
            ->with('alert-primary', 'Tweet successfully created!');
    }
}
