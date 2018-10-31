<?php

namespace Tests\App\Services;

use App\Entity\GifInterface;
use App\Services\GifService;

use PHPUnit\Framework\TestCase;

class GifServiceTest extends TestCase
{
    /**
     * @dataProvider \App\Tests\DataProvider\GifDataProvider::validTermProvider()
     *
     * @param $term
     */
    public function testSearchValid($term)
    {
        $gifService = new GifService();
        $results = $gifService->search($term);
        $this->assertInternalType('array', $results);
        $this->assertTrue(count($results) > 0);
        $this->assertInstanceOf(GifInterface::class, $results[0]);
    }

    /**
     * @dataProvider \App\Tests\DataProvider\GifDataProvider::invalidTermProvider()
     *
     * @param $term
     */
    public function testSearchInvalid($term)
    {
        $gifService = new GifService();
        $results = $gifService->search($term);
        $this->assertInternalType('array', $results);
        $this->assertTrue(count($results) === 0);
    }
}