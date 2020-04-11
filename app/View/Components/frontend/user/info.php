<?php

namespace App\View\Components\frontend\user;

use Domain\Model\DTO\Tweet\UserDTO;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class info extends Component
{
    public UserDTO $user;

    public Collection $feeds;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(UserDTO $user, Collection $feeds)
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
