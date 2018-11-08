<?php

namespace App\Services;

use App\DataProvider\GifDataProvider;
use App\Util\GifUtil;

class GifService
{
    /**
     * @var GifDataProvider
     */
    private $gifDataProvider;

    public function __construct(GifDataProvider $gifDataProvider)
    {
        $this->gifDataProvider = $gifDataProvider;
    }

    /**
     * @param null|string $q
     *
     * @return array
     */
    public function search(?string $q)
    {
        $results = [];
        if (!is_null($q)) {
            foreach (explode(' ', $q) as $word) {
                GifUtil::search($word, $this->gifDataProvider->data(),$results);
            }
            GifUtil::order($results);
        }

        return $results;
    }
}