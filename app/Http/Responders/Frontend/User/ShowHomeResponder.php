<?php

namespace App\Http\Responders\Frontend\User;

use App\Http\Responders\Base\Responder;
use App\Providers\RouteServiceProvider;
use Domain\Model\DTO\Tweet\UserDTO;
use Domain\Model\ValueObject\Tweet\Identifier\UserId;
use Domain\Query\Contract\Tweet\PostedTweetQuery;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ShowHomeResponder extends Responder implements Responsable
{
    private PostedTweetQuery $query;

    private UserDTO $user;

    private int $perPage = 30;

    public function __construct(PostedTweetQuery $query)
    {
        parent::__construct();
        $this->query = $query;
    }

    /**
     * Create response
     *
     * @param [type] $request
     * @return Response
     */
    public function toResponse($request): Response
    {
        $tweets = collect($this->query->postedTweets(new UserId($this->user->identifier)));

        $page = (int) $request->query('page');

        $paginatedFeeds = app()->makeWith(LengthAwarePaginator::class, [
            'items'   => $tweets->forPage($page, $this->perPage),
            'total'   => $tweets->count(),
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
