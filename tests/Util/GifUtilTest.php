<?php

namespace App\Tests\Util;

use App\DataProvider\GifDataProvider;
use App\Entity\GifInterface;
use App\Util\GifUtil;

use PHPUnit\Framework\TestCase;

class GifUtilTest extends TestCase
{
    /**
     * @dataProvider \App\Tests\DataProvider\GifDataProvider::validTermProvider()
     *
     * @param $term
     */
    public function testSearchValidTerm($term)
    {
        $results = [];
        GifUtil::search($term, GifDataProvider::data(), $results);
        $this->assertInternalType('array', $results);
        $this->assertTrue(count($results) > 0);
        $this->assertInstanceOf(GifInterface::class, $results[0]);
    }

    /**
     * @dataProvider \App\Tests\DataProvider\GifDataProvider::invalidTermProvider()
     *
     * @param $term
     */
    public function testSearchInvalidTerm($term)
    {
        $results = [];
        GifUtil::search($term, GifDataProvider::data(), $results);
        $this->assertInternalType('array', $results);
        $this->assertTrue(count($results) === 0);
    }
}