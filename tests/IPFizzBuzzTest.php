<?php

namespace App\Service;

use App\Exception\InvalidIP4Format;
use PHPUnit\Framework\TestCase;

class IPFizzBuzzTest extends TestCase
{
    private $ipFizzBuzz;

    public function setUp(): void
    {
        $this->ipFizzBuzz = new IPFizzBuzz();
    }

    /**
     * @test
     * @dataProvider ExcepitionProvider
     */
    public function shouldReturnExceptionInvalidIP4($value){

        $this->expectException(InvalidIP4Format::class);

        $this->ipFizzBuzz->getFizzBuzzByIP($value);

    }

    public function ExcepitionProvider()
    {
        return [
            'WhenPartsIsDifferentOf4' => array('127.0.0'),
            'WhenPartsIsNotNumericInString' => array('aaa.b.c.d'),
            'WhenPartsIsNotString' => array(111111)
        ];

    }

    /**
     * @test
     * @dataProvider providerSuccessIp
     */
    public function shouldBeReturnValid($expected, $value)
    {

        $this->assertEquals($expected, $this->ipFizzBuzz->getFizzBuzzByIP($value));

    }

    public function providerSuccessIp()
    {
        return [
            'WhenTheValueIsMultipleOf3' => array('expected' => 'Fizz', 'value' => '127.0.0.3'),
            'WhenTheValueIsMultipleOf5' => array('expected' => 'Buzz', 'value' => '127.0.0.5'),
            'WhenTheValueIsNotMultipleOf3AndOf5' => array('expected' => '1', 'value' => '127.0.0.1'),
        ];
    }
}