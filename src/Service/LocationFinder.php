<?php

namespace App\Service;

use App\Entity\Location;
use App\Exception\ErrorOnFindingLocation;
use GuzzleHttp\Client;

class LocationFinder
{
    private $httpClient;

    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function findLocation(string $ip): Location
    {
        $ip = trim($ip);
        $response = $this->httpClient->request('GET', sprintf('https://ipapi.co/%s/json', $ip));
        if ($response->getStatusCode() !== 200) {
            throw new ErrorOnFindingLocation;
        }

        $rawJson = json_decode($response->getBody(), true);

        return new Location(
            $rawJson['continent_code'],
            $rawJson['country_name'],
            $rawJson['city'],
            $rawJson['timezone']
        );
    }
}