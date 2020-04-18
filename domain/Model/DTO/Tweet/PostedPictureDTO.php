<?php

namespace Domain\Model\DTO\Tweet;

use Domain\Model\DTO\Base\DTO;

class PostedPictureDTO extends DTO
{
    protected string $name;

    protected string $tweetId;

    protected string $temporaryPath;

    protected string $fullPath;

    public function __construct(
        string $postedPictureId,
        string $tweetId,
        string $name,
        string $fullPath
    ) {
        $this->identifier = $postedPictureId;
        $this->tweetId = $tweetId;
        $this->name = $name;
        $this->fullPath = $fullPath;
    }
}
