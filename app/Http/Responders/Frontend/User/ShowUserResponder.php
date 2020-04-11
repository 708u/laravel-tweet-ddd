<?php

namespace App\Http\Responders\Frontend\User;

use App\Http\Responders\Base\Responder;
use Domain\Model\DTO\Tweet\UserDTO;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\View\Factory as ViewFactory;

class ShowUserResponder extends Responder implements Responsable
{
    private UserDTO $user;

    private Collection $tweets;

    /** @var int amount of items shown in per pages */
    private int $perPage = 30;

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
        $page = (int) $request->query('page');

        $paginatedTweets = app()->makeWith(LengthAwarePaginator::class, [
            'items'   => $this->tweets->forPage($page, $this->perPage),
            'total'   => $this->tweets->count(),
            'perPage' => $this->perPage,
        ]);

        return new Response(
            $this->view->make('frontend.user.show')->with([
                'user'           => $this->user,
                'tweets'         => $paginatedTweets->withPath('/users/' . $this->user->identifier),
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
