<?php

namespace App\Http\Actions\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Responders\Frontend\Auth\ShowRegistrationFormResponder;

class ShowRegistrationFormAction extends Controller
{
    private ShowRegistrationFormResponder $responder;

    public function __construct(ShowRegistrationFormResponder $responder)
    {
        $this->responder = $responder;
        $this->middleware('guest');
    }

    public function __invoke()
    {
        return $this->responder;
    }
}
