<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AbstractControllerTest
 * @package App\Tests\Controller
 */
abstract class AbstractControllerTest extends WebTestCase
{
    const API_KEY_VALID = [
        'HTTP_X_API_KEY' => '123456'
    ];

    const API_KEY_INVALID = [
        'HTTP_X_API_KEY' => '123'
    ];
    const CONTENT_TYPE = [
        'CONTENT_TYPE' => 'application/json'
    ];

    /**
     * @var Client
     */
    protected static $client;

    public function setUp()
    {
        if (!static::$client) {
            static::$client = static::createClient();
            parent::setUp();
        }
    }

    /**
     * @param string $method
     * @param string $path
     * @param array|null $data
     * @param array $headers
     *
     * @return Response
     */
    protected function sendRequest(string $method, string $path, array $data = null, array $headers = []): Response
    {
        $headers = array_merge($headers, self::CONTENT_TYPE);
        static::$client->request($method, $path, [], [], $headers, json_encode($data));
        return static::$client->getResponse();
    }

    /**
     * @param Response $response
     * @param int $code
     */
    protected function assertResponse(Response $response, int $code)
    {
        $this->assertEquals($code, $response->getStatusCode());
        $this->assertTrue($response->headers->contains('Content-Type', 'application/json'));
        $this->assertJson($response->getContent());
    }
}