<?php

namespace Domain\Model\ValueObject\Tweet\TweetContent;

use InvalidArgumentException;

class TweetContent
{
    private string $content;

    private const CONTENT_MAX_LENGTH = 140;

    private function __construct(string $content)
    {
        $this->content = $content;
    }

    /**
     * Create TweetContent.
     *
     * @param string $content
     * @return self
     */
    public static function factory(string $content): self
    {
        throw_unless(
            strlen($content) > self::CONTENT_MAX_LENGTH,
            new InvalidArgumentException('Tweet content length should be less than 140 chars.')
        );

        return new self($content);
    }

    /**
     * Get tweet content
     *
     * @return string
     */
    public function content(): string
    {
        return $this->content;
    }
}
