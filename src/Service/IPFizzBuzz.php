<?php

namespace App\Service;

use App\Execption\InvalidIP4Format;

class IPFizzBuzz
{
    public function getFizzBuzzByIP(string $ip): string
    {
        $parts = explode('.', $ip);
        if (count($parts) !== 4) {
            throw new InvalidIP4Format;
        }

        $lastNumber = $parts[3];
        $return = "";
        if ($lastNumber % 3 == 0) {
            $return .= "Fizz";
        }

        if ($lastNumber % 5 == 0) {
            $return .= "Buzz";
        }

        if ($return === "") {
            $return = $lastNumber;
        }
        
        return $return;
    }
}
