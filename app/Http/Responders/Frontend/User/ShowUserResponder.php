<?php

namespace App\Http\Responders\Frontend\User;

use App\Http\Responders\Base\Responder;
use Domain\Model\DTO\Tweet\UserDTO;
use Domain\Model\ValueObject\Tweet\Identifier\UserId;
use Domain\Query\Contract\Tweet\PostedTweetQuery;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ShowUserResponder extends Responder implements Responsable
{
    private PostedTweetQuery $query;

    private UserDTO $user;

    /** @var int amount of items shown in per pages */
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
        $page = (int) $request->query('page');

        $tweets = collect($this->query->postedTweets(new UserId($this->user->identifier)));

        $paginatedTweets = app()->makeWith(LengthAwarePaginator::class, [
            'items'   => $tweets->forPage($page, $this->perPage),
            'total'   => $tweets->count(),
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
