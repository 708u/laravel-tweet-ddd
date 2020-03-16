<?php

namespace App\Http\Actions\Frontend\Auth;

use App\Http\Controllers\Controller;

class ShowRegistrationFormAction extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function __invoke()
    {
        return view('frontend.auth.register');
    }
}
