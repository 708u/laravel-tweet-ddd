<?php

namespace App\Http\Responders\Frontend\User;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\View\Factory as ViewFactory;

class IndexUserResponder implements Responsable
{
    private ViewFactory $view;

    private Collection $users;

    /** @var int amount of items shown in per pages */
    private int $perPage = 30;

    public function __construct(ViewFactory $view)
    {
        $this->view = $view;
    }

    /**
     * Create response.
     * Using LengthAwarePagination to paginate.
     *
     * HACK: now, we get ALL users for pagination, should change fetching only targeted users for efficiency.
     *
     * @param [type] $request
     * @return Response
     */
    public function toResponse($request): Response
    {
        $page = (int) $request->query('page');

        $paginatedUsers = app()->makeWith(LengthAwarePaginator::class, [
            'items'   => $this->users->forPage($page, $this->perPage),
            'total'   => $this->users->count(),
            'perPage' => $this->perPage,
        ]);

        return new Response(
            $this->view->make('frontend.user.index', ['users' => $paginatedUsers->withPath('/users')])
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
