<?php

require __DIR__.'/vendor/autoload.php';

use App\Service\IPFinder;
use App\Service\LocationFinder;
use App\Service\IPFizzBuzz;
use GuzzleHttp\Client;

// Cria o cliente http que fará requests
$guzzle = new Client;

// Cria o IPFinder com o cliente http e em seguida descobre qual é seu IPv4 público.
$ipFinder = new IPFinder($guzzle);
$ip = $ipFinder->findIp();

// Cria o LocationFinder que usa o cliente http para descobrir a localizaco do seu IPv4.
$locationFinder = new LocationFinder($guzzle);
$location = $locationFinder->findLocation($ip);

// Brinca com o ip de fizzbuzz. 
// Send o IP do formato A.B.C.D 
// Se D for multiplo de 3, o metodo getFizzBuzzByIP retorna "Fizz".
// Se D for multiplo de 5, o metodo getFizzBuzzByIP retorna "Buzz".
// Se D for multiplo de 3 e 5, o metodo getFizzBuzzByIP retorna "FizzBuzz".
// Caso nao seja multiplo de nenhum desses numeros, ele retorna o proprio "D".
$ipFizzBuzz = new IPFizzBuzz();
$fizzBuzz = $ipFizzBuzz->getFizzBuzzByIP($ip); 

printf(
    "O ip %s é de %s, %s\nO continente é %s e agora local lá é %s\nThis ip is %s" ,
    $ip,
    $location->getCity(),
    $location->getCountry(),
    $location->getContinent(),
    $location->getDateTime()->format('Y-m-d H:i:s'),
    $fizzBuzz
);
