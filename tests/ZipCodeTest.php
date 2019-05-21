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
        $address = (new ZipCode)->findByCep('99999-999');

        $this->assertInstanceOf(Address::class, $address);

        array_map(function ($value) {
            $this->assertTrue(empty($value));
        }, get_object_vars($address));
    }

    public function testFindAddress()
    {
        $zipcode = '01001-000';
        $address = (new ZipCode)->findByCep($zipcode);

        $this->assertInstanceOf(Address::class, $address);
        $this->assertEquals($zipcode, $address->zipCode);
    }

    public function testFindAddressByStreetName()
    {
        $state = 'MG';
        $city = 'Belo Horizonte';
        $street = 'Rua João';
        $addresses = (new ZipCode)->findByAddress($state, $city, $street);

        array_map(function ($address) {
            $this->assertInstanceOf(Address::class, $address);
        }, $addresses);
    }
}
