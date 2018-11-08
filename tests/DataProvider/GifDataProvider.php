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
    public function nullTermProvider()
    {
        return [
            [null]
        ];
    }

    /**
     * @return array
     */
    public function invalidTermProvider()
    {
        return [
            ['dog'],
            ['math']
        ];
    }
}