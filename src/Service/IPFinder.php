<?php

namespace App\Service;

use GuzzleHttp\Client;

class IPFinder
{
    private $httpClient;

    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function findIp(): string
    {
        $response = $this->httpClient->request('GET', 'https://checkip.amazonaws.com/');
        
        return str_replace("\n", '', $response->getBody());
    }
}