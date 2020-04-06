<?php

namespace App\View\Components\Frontend\Tweets;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class Tweet extends Component
{
    public LengthAwarePaginator $tweets;

    public string $username;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(LengthAwarePaginator $tweets, string $username)
    {
        $this->tweets = $tweets;
        $this->username = $username;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.frontend.tweets.tweet');
    }
}
