<?php

namespace App\Service;

use App\Exception\InvalidIP4Format;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class IPFinderTest extends TestCase
{
    private $ipFinder;

    private $client;

    public function setUp(): void
    {
        $this->client = $this->getMockBuilder(Client::Class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->ipFinder = new IPFinder($this->client);
    }

    /**
     * @test
     */
    public function shouldReturnIP()
    {
        $ip = "127.0.0.3";
        $response = $this->getMockBuilder(Response::class)->disableOriginalConstructor()->getMock();
        $response->method('getBody')->willReturn($ip);

        $this->client->method('request')->willReturn($response);

        $this->assertEquals($ip, $this->ipFinder->findIp());
    }

    /**
     * @test
     */
    public function shouldReturnIPWithoutBreakLines()
    {
        $response = $this->getMockBuilder(Response::class)->disableOriginalConstructor()->getMock();
        $response->method('getBody')->willReturn("127.0.0.3\n");
        $this->client->method('request')->willReturn($response);

        $this->assertEquals("127.0.0.3", $this->ipFinder->findIp());
    }

    /**
     * @test
     */
    public function shouldThrowException()
    {
        $this->expectException(\Exception::class);

        $this->client->method('request')->will($this->throwException(new \Exception));

        $this->ipFinder->findIp();
    }
}
