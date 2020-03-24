<?php

namespace App\Http\Actions\Frontend\Verify;

use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;

class ShowVerifyNoticeAction
{
    use VerifiesEmails;

    /**
     * Show the email verification notice.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
                        ? redirect($this->redirectPath())
                        : view('frontend.verify.notice');
    }
}
