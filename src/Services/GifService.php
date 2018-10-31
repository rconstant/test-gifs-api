<?php

namespace App\Services;

use App\DataProvider\GifDataProvider;
use App\Util\GifUtil;

class GifService
{
    /**
     * @param null|string $q
     *
     * @return array
     */
    public function search(?string $q)
    {
        $results = [];
        foreach (explode(' ', $q) as $word) {
            GifUtil::search($word, GifDataProvider::data(), $results);
        }

        GifUtil::order($results);

        return $results;
    }
}