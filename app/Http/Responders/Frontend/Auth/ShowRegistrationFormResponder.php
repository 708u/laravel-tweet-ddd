<?php

namespace App\Http\Responders\Frontend\Auth;

use App\Http\Responders\Base\Responder;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;
use Illuminate\View\Factory as ViewFactory;

class ShowRegistrationFormResponder extends Responder implements Responsable
{
    /**
     * Create response
     *
     * @param [type] $request
     * @return Response
     */
    public function toResponse($request): Response
    {
        return new Response(
            $this->view->make('frontend.auth.register', [
                'profileCardTitle' => __('Register'),
                'actionButton'     => __('Register'),
            ])
        );
    }
}
