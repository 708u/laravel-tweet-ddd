<?php

namespace App\Http\Responders\Frontend\User;

use App\Http\Responders\Base\Responder;
use App\Providers\RouteServiceProvider;
use Domain\Model\DTO\Tweet\UserDTO;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\View\Factory as ViewFactory;

class ShowHomeResponder extends Responder implements Responsable
{
    private UserDTO $user;

    private Collection $feeds;

    private int $perPage = 30;

    /**
     * Create response
     *
     * @param [type] $request
     * @return Response
     */
    public function toResponse($request): Response
    {
        $page = (int) $request->query('page');

        $paginatedFeeds = app()->makeWith(LengthAwarePaginator::class, [
            'items'   => $this->feeds->forPage($page, $this->perPage),
            'total'   => $this->feeds->count(),
            'perPage' => $this->perPage,
        ]);

        return new Response(
            $this->view->make('frontend.user.home')->with([
                'user'  => $this->user,
                'feeds' => $paginatedFeeds->withPath(RouteServiceProvider::HOME),
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
