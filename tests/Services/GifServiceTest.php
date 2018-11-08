<?php

namespace Tests\App\Services;

use App\DataProvider\GifDataProvider;
use App\Entity\GifInterface;
use App\Services\GifService;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GifServiceTest extends WebTestCase
{
    /**
     * @var GifDataProvider
     */
    private $gifDataProvider;

    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        self::bootKernel();
        $container = self::$container;

        $this->gifDataProvider = $container->get(GifDataProvider::class);
    }

    /**
     * @dataProvider \App\Tests\DataProvider\GifDataProvider::validTermProvider()
     *
     * @param string $term
     */
    public function testSearchValid(?string $term)
    {
        $gifService = new GifService($this->gifDataProvider);
        $results = $gifService->search($term);
        $this->assertInternalType('array', $results);
        $this->assertTrue(count($results) > 0);
        $this->assertInstanceOf(GifInterface::class, $results[0]);
    }

    /**
     * @dataProvider \App\Tests\DataProvider\GifDataProvider::invalidTermProvider()
     * @dataProvider \App\Tests\DataProvider\GifDataProvider::nullTermProvider()
     *
     * @param string $term
     */
    public function testSearchInvalid(?string $term)
    {
        $gifService = new GifService($this->gifDataProvider);
        $results = $gifService->search($term);
        $this->assertInternalType('array', $results);
        $this->assertTrue(count($results) === 0);
    }
}