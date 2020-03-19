<?php

namespace App\Http\Actions\Frontend\User;

use App\Http\Controllers\Controller;

class ShowUserAction extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function __invoke(string $uuid)
    {
        return view('frontend.user.show');
    }
}
