<?php

namespace App\View\Components\Frontend\User;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class Users extends Component
{
    public LengthAwarePaginator $users;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(LengthAwarePaginator $users)
    {
        $this->users = $users;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.frontend.user.users');
    }
}
