<?php

namespace App\Util;

use App\Entity\Gif;

class GifUtil
{
    /**
     * @param string $word
     * @param array $datas
     * @param array $results
     */
    public static function search(string $word, array $datas, array &$results = []) {
        $input = preg_quote($word, '~');
        foreach ($datas as $data) {
            /**
             * @var Gif $data
             */
            if (count(preg_grep('~' . $input . '~', $data->getTags())) > 0) {
                if (!in_array($data, $results)) {
                    $results[] = $data;
                }
            }
        }
    }

    /**
     * @param $results
     */
    public static function order(&$results) {
        usort($results, function ($a, $b) {
            /**
             * @var Gif $a
             * @var Gif $b
             */
            return $a->getTitle() <=> $b->getTitle();
        });
    }
}