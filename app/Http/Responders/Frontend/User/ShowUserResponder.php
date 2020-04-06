<?php

namespace App\Http\Responders\Frontend\User;

use Domain\Model\DTO\Tweet\UserDTO;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\View\Factory as ViewFactory;

class ShowUserResponder implements Responsable
{
    private ViewFactory $view;

    private UserDTO $user;

    private Collection $tweets;

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
            $this->view->make('frontend.user.show')->with([
                'user'   => $this->user,
                'tweets' => $this->tweets,
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

    /**
     * Set Tweets
     *
     * @param Collection $tweets
     * @return self
     */
    public function setTweets(Collection $tweets): self
    {
        $this->tweets = $tweets;
        return clone $this;
    }
}
