<?php

namespace App\View\Components\Frontend\Tweets;

use Domain\Model\DTO\UI\PostedTweetDTO;
use Illuminate\View\Component;

class Tweet extends Component
{
    public PostedTweetDTO $tweet;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(PostedTweetDTO $tweet)
    {
        $this->tweet = $tweet;
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
