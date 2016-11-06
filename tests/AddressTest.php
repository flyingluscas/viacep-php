<?php

namespace FlyingLuscas\ViaCEP;

class AddressTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_transform_address_into_array()
    {
        $data = $this->makeAddress();
        $address = new Address($data);

        $this->assertTrue(is_array($address->toArray()), 'Invalid address array');
        $this->assertEquals(array_keys(get_object_vars($address)), array_keys($address->toArray()), 'Invalid address array structure');
    }

    /**
     * @test
     */
    public function it_can_transform_address_into_json()
    {
        $data = $this->makeAddress();
        $address = new Address($data);

        $this->assertJson($address->toJson(), 'Invalid json address');
    }
}
