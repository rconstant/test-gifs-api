<?php

namespace App\Entity;

interface GifInterface
{
    /**
     * @return string
     */
    public function getTitle(): string;

    /**
     * @param string $title
     * @return GifInterface
     */
    public function setTitle(string $title): GifInterface;

    /**
     * @return string
     */
    public function getUrl(): string;

    /**
     * @param string $url
     * @return GifInterface
     */
    public function setUrl(string $url): GifInterface;

    /**
     * @return array
     */
    public function getTags(): array;

    /**
     * @param array $tags
     * @return GifInterface
     */
    public function setTags(array $tags): GifInterface;
}