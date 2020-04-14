<?php

namespace Domain\Model\Entity\Tweet;

use Domain\Model\DTO\Base\DTO;
use Domain\Model\Entity\Base\Entity;
use Domain\Model\ValueObject\Tweet\Identifier\PostedPictureId;
use Domain\Model\ValueObject\Tweet\Identifier\TweetId;

class PostedPicture extends Entity
{
    private string $path;

    private TweetId $tweetId;

    private string $temporaryPath;

    public function __construct(
        PostedPictureId $postedPictureId,
        string $path,
        TweetId $tweetId,
        string $temporaryPath = ''
    ) {
        $this->identifier = $postedPictureId;
        $this->path = $path;
        $this->tweetId = $tweetId;
        $this->temporaryPath = $temporaryPath;
    }

    public function toDTO(): DTO
    {
        //
    }

    /**
     * Get object path.
     *
     * @return string
     */
    public function path(): string
    {
        return $this->path;
    }

    /**
     * Get TweetId.
     *
     * @return TweetId
     */
    public function tweetId(): TweetId
    {
        return $this->tweetId;
    }

    /**
     * Get temporary path
     *
     * @return string
     */
    public function temporaryPath(): string
    {
        return $this->temporaryPath;
    }
}
