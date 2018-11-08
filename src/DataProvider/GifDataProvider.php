<?php

namespace App\DataProvider;

use App\Entity\Gif;

/**
 * Class GifDataProvider
 * @package App\DataProvider
 */
class GifDataProvider
{
    /**
     * @return array
     */
    public function data()
    {
        return [
            new Gif('Robot', 'https://gph.is/28Sr91i', [
                'robot',
                'banana'
            ]),
            new Gif('Banana', 'https://gph.is/1qtrZH2', [
                'banana',
                'cat',
                'eating'
            ]),
            new Gif('Bored cat', 'https://gph.is/2d8adKP', [
                'cat',
                'bored',
                'nail'
            ]),
            new Gif('Coffee monday', 'https://gph.is/2zJfh1e', [
                'coffee',
                'monday',
                'latte',
                'caffeine'
            ]),
            new Gif('Monday', 'https://gph.is/2LbplCL', [
                'funny',
                'monday',
                'kid'
            ]),
            new Gif('Funny cat', 'https://gph.is/1LjlEFE', [
                'funny',
                'cat',
                'computer',
                'keyboard'
            ]),
            new Gif('Work working', 'https://gph.is/2erodvg', [
                'coffee',
                'work',
                'computer',
                'keyboard',
                'hand'
            ]),
            new Gif('Animated computer', 'https://gph.is/1nFIYPM', [
                'animation',
                'work',
                'computer',
                'hand'
            ]),
        ];
    }
}