<?php

namespace App\Service;

use App\Exception\InvalidIP4Format;
use App\Entity\Location;
use App\Exception\ErrorOnFindingLocation;;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class LocationFinderTest extends TestCase
{
    private $locationFinder;

    private $client;

    public function setUp(): void
    {
        $this->client = $this->getMockBuilder(Client::Class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->locationFinder = new LocationFinder($this->client);
    }

    /**
     * @test
     */
    public function shouldReturnLocation()
    {
        $response = $this->getMockBuilder(Response::class)->disableOriginalConstructor()->getMock();
        $response->method('getStatusCode')->willReturn(200);
        $response->method('getBody')->willReturn(json_encode([
            'continent_code' => 'EU',
            'country_name' => 'PT',
            'city' => 'Lisbon',
            'timezone' => 'Europe/Lisbon',
        ]));
        
        $this->client->method('request')->willReturn($response);

        $this->assertInstanceOf(Location::class, $this->locationFinder->findLocation("127.0.0.3"));
    }

    /**
     * @test
     */
    public function shouldThrowErrorIfStatusCodeIsNot200()
    {
        $this->expectException(ErrorOnFindingLocation::class);

        $response = $this->getMockBuilder(Response::class)->disableOriginalConstructor()->getMock();
        $response->method('getStatusCode')->willReturn(401);
                
        $this->client->method('request')->willReturn($response);

        $this->locationFinder->findLocation("127.0.0.3");
    }
}
