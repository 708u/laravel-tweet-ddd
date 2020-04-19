<?php

namespace Domain\Model\Entity\Tweet;

use Domain\Model\DTO\Tweet\PostedPictureDTO;
use Domain\Model\Entity\Base\Entity;
use Domain\Model\ValueObject\Tweet\Identifier\PostedPictureId;
use Domain\Model\ValueObject\Tweet\Identifier\TweetId;

class PostedPicture extends Entity
{
    private string $name;

    private TweetId $tweetId;

    private string $temporaryPath;

    public const DIRECTORY_PREFIX = 'posted_pictures';

    public const MAX_UPLOADING_IMAGE_SIZE = '5120';

    public function __construct(
        PostedPictureId $postedPictureId,
        TweetId $tweetId,
        string $name,
        string $temporaryPath = ''
    ) {
        $this->identifier = $postedPictureId;
        $this->tweetId = $tweetId;
        $this->name = $name;
        $this->temporaryPath = $temporaryPath;
    }

    /**
     * Generate entity to DTO.
     *
     * @return PostedPictureDTO
     */
    public function toDTO(): PostedPictureDTO
    {
        return new PostedPictureDTO(
            $this->identifierAsString(),
            $this->tweetId()->toString(),
            $this->name(),
            $this->fullPath()
        );
    }

    /**
     * Get object name.
     *
     * @return string
     */
    public function name(): string
    {
        return $this->name;
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

    /**
     * Get full path for persistence.
     *
     * @return string
     */
    public function fullPath(): string
    {
        return self::DIRECTORY_PREFIX . '/' . $this->identifierAsString() . '/' . $this->name();
    }
}
