<?php

namespace App\Http\Actions\Frontend\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowHomeAction extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        return view('frontend.user.home');
    }
}
