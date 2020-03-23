<?php

namespace App\Http\Responders\Frontend\User;

use Domain\Model\DTO\Tweet\UserDTO;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\View\Factory as ViewFactory;

class IndexUserResponder implements Responsable
{
    private ViewFactory $view;

    private Collection $users;

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
            $this->view->make('frontend.user.index', ['users' => $this->users])
        );
    }

    /**
     * Set UserDTO
     *
     * @param Collection $users
     * @return self
     */
    public function setUsers(Collection $users): self
    {
        $this->users = $users;
        return clone $this;
    }
}
