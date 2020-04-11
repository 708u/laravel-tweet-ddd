<?php

namespace App\Http\Responders\Frontend\User;

use App\Http\Responders\Base\Responder;
use Domain\Model\DTO\Tweet\UserDTO;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;
use Illuminate\View\Factory as ViewFactory;

class EditUserResponder extends Responder implements Responsable
{
    private UserDTO $user;

    /**
     * Create response
     *
     * @param [type] $request
     * @return Response
     */
    public function toResponse($request): Response
    {
        return new Response(
            $this->view->make('frontend.user.edit')->with([
                'user' => $this->user,
                'uuid' => $this->user->identifier,
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
