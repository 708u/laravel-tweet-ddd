<?php

namespace App\Http\Responders\Frontend\User;

use Domain\Model\DTO\Tweet\UserDTO;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\View\Factory as ViewFactory;

class ShowHomeResponder implements Responsable
{
    private ViewFactory $view;

    private UserDTO $user;

    private Collection $feeds;

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
            $this->view->make('frontend.user.home')->with([
                'user'  => $this->user,
                'feeds' => $this->feeds,
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
     * Set feeds
     *
     * @param Collection $tweets
     * @return self
     */
    public function setFeeds(Collection $feeds): self
    {
        $this->feeds = $feeds;
        return clone $this;
    }
}
