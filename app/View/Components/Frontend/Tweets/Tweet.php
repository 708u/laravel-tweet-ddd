<?php

namespace App\View\Components\Frontend\Tweets;

use Domain\Model\DTO\Tweet\TweetDTO;
use Illuminate\View\Component;

class Tweet extends Component
{
    public TweetDTO $tweet;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(TweetDTO $tweet)
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
