<?php

namespace App\Tests\Controller;

/**
 * Class GifControllerTest
 * @package App\Tests\Controller
 */
class GifControllerTest extends AbstractControllerTest
{
    /**
     * @dataProvider \App\Tests\DataProvider\GifDataProvider::validTermProvider()
     * @dataProvider \App\Tests\DataProvider\GifDataProvider::nullTermProvider()
     *
     * @param string $term
     */
    public function testSearchUnauthorized(?string $term)
    {
        $data = [
            'code' => 403,
            'message' => 'Invalid API KEY.'
        ];

        $response = $this->sendRequest('GET', '/gifs/search?q=' . $term, [], parent::API_KEY_INVALID);
        parent::assertResponse($response, 403);
        $this->assertSame($data, json_decode($response->getContent(), true));
    }

    /**
     * @dataProvider \App\Tests\DataProvider\GifDataProvider::validTermProvider()
     * @dataProvider \App\Tests\DataProvider\GifDataProvider::nullTermProvider()
     *
     * @param string $term
     */
    public function testSearchValid(?string $term)
    {
        $response = $this->sendRequest('GET', '/gifs/search?q=' . $term, [], parent::API_KEY_VALID);
        parent::assertResponse($response, 200);
    }

    /**
     * @dataProvider \App\Tests\DataProvider\GifDataProvider::invalidTermProvider()
     *
     * @param string $term
     */
    public function testSearchInvalid(string $term)
    {
        $data = [
            'code' => 404,
            'message' => 'No GIFs found.'
        ];

        $response = $this->sendRequest('GET', '/gifs/search?q=' . $term, [], parent::API_KEY_VALID);
        parent::assertResponse($response, 404);
        $this->assertSame($data, json_decode($response->getContent(), true));
    }
}