<?php

namespace App\Http\Actions\Frontend\Auth;

use App\Http\Controllers\Controller;

class ShowLoginFormAction extends Controller
{
    public function __invoke()
    {
        return view('frontend.auth.login');
    }
}
