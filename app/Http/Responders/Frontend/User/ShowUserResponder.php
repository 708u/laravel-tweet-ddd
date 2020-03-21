<?php

namespace App\Http\Responders\Frontend\User;

use Domain\Model\DTO\Tweet\UserDTO;
use Illuminate\Http\Response;
use Illuminate\View\Factory as ViewFactory;
use Illuminate\Contracts\Support\Responsable;

class ShowUserResponder implements Responsable
{
    private ViewFactory $view;

    private UserDTO $user;

    public function __construct(ViewFactory $view)
    {
        $this->view = $view;
    }

    /**
     * Undocumented function
     *
     * @param [type] $request
     * @return Response
     */
    public function toResponse($request): Response
    {
        return new Response(
            $this->view->make('frontend.user.show')->with([
                'user' => $this->user
            ])
        );
    }

    /**
     * Set UserDTO
     *
     * @param UserDTO $user
     * @return self
     */
    public function setUser(UserDTO $user): self
    {
        $this->user = $user;
        return clone $this;
    }
}
