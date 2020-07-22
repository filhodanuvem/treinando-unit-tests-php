<?php

namespace App\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class IPFinderTest extends TestCase
{
    private $client;
    private $ipFinder;
    protected function setUp(): void
    {
        parent::setUp();

        $this->client = $this->createMock(Client::class);
        $this->ipFinder = new IPFinder($this->client);

    }


    /**
     * @test
     */
    public function shouldReturnAnIpInStringWhenIpIsValid()
    {
        $ip = '200.97.131.171';
        $headers = ['Content-Type' => 'application/json'];

        $response = new Response(200, $headers, $ip);

        $this->client->method('request')
            ->willReturn($response);

        $this->assertEquals($ip, $this->ipFinder->findIp());
    }

    /**
     * @test
     */
    public function shouldReturnExceptionWhenResponseIsInvalid()
    {

        $this->expectException(\Exception::class);

        $this->client->method('request')
            ->willReturn($this->throwException(new \Exception));

        $this->ipFinder->findIp();

    }


}