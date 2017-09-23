<?php

namespace FlyingLuscas\ViaCEP;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Handler\MockHandler;

class ZipCodeTest extends TestCase
{
    public function testGetEmptyAddressInCaseOfErrors()
    {
        $address = (new ZipCode)->find('99999-999');

        $this->assertInstanceOf(Address::class, $address);

        array_map(function ($value) {
            $this->assertTrue(empty($value));
        }, get_object_vars($address));
    }

    public function testFindAddress()
    {
        $zipcode = '01001-000';
        $address = (new ZipCode)->find($zipcode);

        $this->assertInstanceOf(Address::class, $address);
        $this->assertEquals($zipcode, $address->zipCode);
    }
}
