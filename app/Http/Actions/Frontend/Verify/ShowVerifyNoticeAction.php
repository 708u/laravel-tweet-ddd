<?php

namespace App\Http\Actions\Frontend\Verify;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;

class ShowVerifyNoticeAction extends Controller
{
    use VerifiesEmails;

    public function __construct()
    {
        $this->middleware('auth');
    }

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
                        : view('frontend.verification.notice');
    }
}
