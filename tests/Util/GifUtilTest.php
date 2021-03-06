<?php

namespace App\Tests\Util;

use App\DataProvider\GifDataProvider;
use App\Entity\GifInterface;
use App\Util\GifUtil;

use PHPUnit\Framework\TestCase;

class GifUtilTest extends TestCase
{
    /**
     * @var GifDataProvider
     */
    private $gifDataProvider;

    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->gifDataProvider = new GifDataProvider();
    }

    /**
     * @dataProvider \App\Tests\DataProvider\GifDataProvider::validTermProvider()
     *
     * @param string $term
     */
    public function testSearchValidTerm(string $term)
    {
        $results = [];
        GifUtil::search($term, $this->gifDataProvider->data(), $results);
        $this->assertInternalType('array', $results);
        $this->assertTrue(count($results) > 0);
        $this->assertInstanceOf(GifInterface::class, $results[0]);
    }

    /**
     * @dataProvider \App\Tests\DataProvider\GifDataProvider::invalidTermProvider()
     *
     * @param string $term
     */
    public function testSearchInvalidTerm(string $term)
    {
        $results = [];
        GifUtil::search($term, $this->gifDataProvider->data(), $results);
        $this->assertInternalType('array', $results);
        $this->assertTrue(count($results) === 0);
    }
}