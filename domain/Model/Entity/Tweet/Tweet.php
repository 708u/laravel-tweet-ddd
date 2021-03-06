<?php

namespace Domain\Model\Entity\Tweet;

use Carbon\CarbonImmutable;
use Domain\Application\Contract\Uuid\UuidGeneratable;
use Domain\Model\DTO\Tweet\TweetDTO;
use Domain\Model\Entity\Base\Entity;
use Domain\Model\ValueObject\Tweet\Identifier\PostedPictureId;
use Domain\Model\ValueObject\Tweet\Identifier\TweetId;
use Domain\Model\ValueObject\Tweet\Identifier\UserId;
use Domain\Model\ValueObject\Tweet\TweetContent\TweetContent;

class Tweet extends Entity
{
    private UserId $userId;

    private string $username;

    private TweetContent $tweetContent;

    private CarbonImmutable $timestamp;

    private array $postedPictures = [];

    public function __construct(
        TweetId $tweetId,
        UserId $userId,
        string $username,
        TweetContent $tweetContent,
        CarbonImmutable $timestamp,
        array $postedPictures = []
    ) {
        $this->identifier = $tweetId;
        $this->userId = $userId;
        $this->username = $username;
        $this->tweetContent = $tweetContent;
        $this->timestamp = $timestamp;
        $this->postedPictures = $postedPictures;
    }

    /**
     * generate entity to DTO.
     *
     * @return TweetDTO
     */
    public function toDTO(): TweetDTO
    {
        return new TweetDTO(
            $this->identifierAsString(),
            $this->userId->toString(),
            $this->username(),
            $this->tweetContent(),
            $this->timestamp
        );
    }

    /**
     * Post Picture
     *
     * @param string $fileName
     * @param string $temporaryPath
     * @return void
     */
    public function postPicture(string $fileName, string $temporaryPath): PostedPicture
    {
        $postedPicture = new PostedPicture(
            new PostedPictureId(resolve(UuidGeneratable::class)->nextIdentifier()),
            $this->identifier(),
            $fileName,
            $temporaryPath
        );

        $this->postedPictures[] = $postedPicture;

        return $postedPicture;
    }

    /**
     * get Posted pictures.
     *
     * @return array
     */
    public function postedPictures(): array
    {
        return $this->postedPictures;
    }

    /**
     * get user id
     *
     * @return UserId
     */
    public function userId(): UserId
    {
        return $this->userId;
    }

    /**
     * get username
     *
     * @return string
     */
    public function username(): string
    {
        return $this->username;
    }

    /**
     * get tweet content.
     *
     * @return string
     */
    public function tweetContent(): string
    {
        return $this->tweetContent->content();
    }

    /**
     * get timestamp as string.
     *
     * @return string
     */
    public function timestamp(): string
    {
        return $this->timestamp->toDateTimeString();
    }
}
