<?php

namespace App\View\Components\frontend\user;

use Domain\Model\DTO\Tweet\UserDTO;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class info extends Component
{
    public UserDTO $user;

    public LengthAwarePaginator $feeds;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(UserDTO $user, LengthAwarePaginator $feeds)
    {
        $this->user = $user;
        $this->feeds = $feeds;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.frontend.user.info');
    }
}
