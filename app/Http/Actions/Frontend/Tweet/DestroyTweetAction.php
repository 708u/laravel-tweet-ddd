<?php

namespace App\Http\Actions\Frontend\Tweet;

use App\Http\Controllers\Controller;

class DestroyTweetAction extends Controller
{
    public function __construct()
    {
        $this->middleware('RedirectIfAuthUserDosentHaveGivenUuid');
    }

    public function __invoke(string $tweetUuid)
    {
        //
    }
}
