<?php

namespace App\Http\Responders\Frontend\Auth;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;
use Illuminate\View\Factory as ViewFactory;

class ShowRegistrationFormResponder implements Responsable
{
    private ViewFactory $view;

    public function __construct(ViewFactory $view)
    {
        $this->view = $view;
    }

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
