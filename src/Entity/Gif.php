<?php

namespace App\Entity;

/**
 * Class Gif
 * @package App\Entity
 */
class Gif implements GifInterface
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $url;

    /**
     * @var array
     */
    private $tags;

    public function __construct(string $title, string $url, array $tags)
    {
        $this->title = $title;
        $this->url = $url;
        $this->tags = $tags;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return GifInterface
     */
    public function setTitle(string $title): GifInterface
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return GifInterface
     */
    public function setUrl(string $url): GifInterface
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return array
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @param array $tags
     * @return GifInterface
     */
    public function setTags(array $tags): GifInterface
    {
        $this->tags = $tags;
        return $this;
    }
}