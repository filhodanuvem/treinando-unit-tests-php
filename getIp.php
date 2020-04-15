<?php

require __DIR__.'/vendor/autoload.php';

use App\Service\IPFinder;
use App\Service\LocationFinder;
use App\Service\IPFizzBuzz;
use GuzzleHttp\Client;

$guzzle = new Client;
$ipFinder = new IPFinder($guzzle);
$ip = $ipFinder->findIp();

$locationFinder = new LocationFinder($guzzle);
$location = $locationFinder->findLocation($ip);

$ipFizzBuzz = new IPFizzBuzz();

printf(
    "O ip %s é de %s, %s\nO continente é %s e agora local lá é %s\nThis ip is %s" ,
    $ip,
    $location->getCity(),
    $location->getCountry(),
    $location->getContinent(),
    $location->getDateTime()->format('Y-m-d H:i:s'),
    $ipFizzBuzz->getFizzBuzzByIP($ip)
);