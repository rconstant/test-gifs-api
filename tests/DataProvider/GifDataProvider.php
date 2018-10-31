<?php

namespace App\Tests\DataProvider;

class GifDataProvider
{
    /**
     * @return array
     */
    public function validTermProvider()
    {
        return [
            ['banana'],
            ['cat'],
            ['computer']
        ];
    }

    /**
     * @return array
     */
    public function invalidTermProvider()
    {
        return [
            ['dog'],
            ['math'],
        ];
    }
}