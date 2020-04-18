<?php

namespace Domain\Model\DTO\UI;

use Domain\Model\DTO\Base\DTO;
use Domain\Model\DTO\Tweet\TweetDTO;
use Illuminate\Support\Collection;

class PostedTweetDTO extends DTO
{
    protected TweetDTO $tweet;

    protected array $postedPictures;

    public function __construct(TweetDTO $tweetDTO, array $postedPictures)
    {
        $this->tweet = $tweetDTO;
        $this->postedPictures = $postedPictures;
    }
}
