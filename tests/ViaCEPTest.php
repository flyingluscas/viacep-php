<?php

namespace FlyingLuscas\ViaCEP;

class ViaCEPTest extends TestCase
{
    public function testGetEmptyAddressInCaseOfErrors()
    {
        $address = (new ViaCEP)->findByZipCode('99999-999');

        $this->assertInstanceOf(Address::class, $address);

        array_map(function ($value) {
            $this->assertTrue(empty($value));
        }, get_object_vars($address));
    }

    public function testFindAddressByZipCode()
    {
        $zipcode = '01001-000';
        $address = (new ViaCEP)->findByZipCode($zipcode);

        $this->assertInstanceOf(Address::class, $address);
        $this->assertEquals($zipcode, $address->zipCode);
    }

    public function testGetEmptyListOfAddressesInCaseOfErrors()
    {
        $state = 'PR';
        $city = 'Maringá';
        $street = 'Bender';

        $addresses = (new ViaCEP)->findByStreetName($state, $city, $street);

        $this->assertCount(0, $addresses);
    }

    public function testFindAddressByStreetName()
    {
        $state = 'SP';
        $city = 'São Paulo';
        $street = 'Vapabussu';

        $addresses = (new ViaCEP)->findByStreetName($state, $city, $street);

        $this->assertCount(2, $addresses);

        array_map(function ($address) {
            $this->assertInstanceOf(Address::class, $address);
            $this->assertEquals('Rua Vapabussu', $address->street);
        }, $addresses);
    }
}
