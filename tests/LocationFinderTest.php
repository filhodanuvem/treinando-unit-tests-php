<?php


namespace Tests;


use App\Entity\Location;
use App\Exception\ErrorOnFindingLocation;
use App\Service\LocationFinder;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class LocationFinderTest extends TestCase
{
    private $client;
    private $locationFinder;
    protected function setUp(): void
    {
        parent::setUp();
        $this->client = $this->createMock(Client::class);
        $this->locationFinder = new LocationFinder($this->client);
    }

    /**
     * @test
     */
    public function shouldReturnExceptionWhenResponseCodeIsNot200()
    {

        $ip = '200.97.131.171';
        $headers = ['Content-Type' => 'application/json'];

        $response = new Response(400, $headers, '');

        $this->client->method('request')
            ->willReturn($response);

        $this->expectException(ErrorOnFindingLocation::class);

        $this->locationFinder->findLocation($ip);


    }

    /**
     * @test
     */
    public function shouldReturnALocatationClass()
    {

        $ip = '200.97.131.171';

        $data = [
            'continent_code' => 'Teste',
            'country_name' => 'Teste',
            'city' => 'Teste',
            'timezone' => 'Teste',
        ];

        $headers = ['Content-Type' => 'application/json'];

        $response = new Response(200, $headers, json_encode($data));

        $this->client->method('request')
            ->willReturn($response);


      $findLocation = $this->locationFinder->findLocation($ip);
        $this->assertInstanceOf(Location::class, $findLocation);

    }


}