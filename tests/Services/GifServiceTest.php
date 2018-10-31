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
     * @param string $term
     */
    public function testSearchValid(string $term)
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
     * @param string $term
     */
    public function testSearchInvalid(string $term)
    {
        $gifService = new GifService();
        $results = $gifService->search($term);
        $this->assertInternalType('array', $results);
        $this->assertTrue(count($results) === 0);
    }
}