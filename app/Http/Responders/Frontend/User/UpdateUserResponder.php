<?php

namespace App\Http\Responders\Frontend\User;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class UpdateUserResponder
{
    /**
     * Create redirect response
     *
     * @return Response
     */
    public function toResponse(): RedirectResponse
    {
        return back()->with('alert-primary', 'Update successfully!');
    }
}
