<?php

namespace FlyingLuscas\ViaCEP;

class AddressTest extends TestCase
{
    public function testIfItCanTransformAddressIntoArrau()
    {
        $data = $this->makeAddress();
        $address = new Address($data);

        $this->assertTrue(is_array($address->toArray()), 'Invalid address array');
        $this->assertEquals(
            array_keys(get_object_vars($address)),
            array_keys($address->toArray()),
            'Invalid address array structure'
        );
    }

    public function testIfItCanTransformAddressIntoJSON()
    {
        $data = $this->makeAddress();
        $address = new Address($data);

        $this->assertJson($address->toJson(), 'Invalid json address');
    }

    /**
     * Make stub address.
     *
     * @param  array  $data
     *
     * @return array
     */
    protected function makeAddress(array $data = [])
    {
        return array_merge([
            'cep' => '99999-999',
            'logradouro' => 'Dummy street name',
            'complemento' => 'Dummy address complement',
            'bairro' => 'Dummy address district',
            'localidade' => 'Dummy city name',
            'uf' => 'Dummy state name',
            'unidade' => '',
            'ibge' => '9999999',
            'gia' => '9999'
        ], $data);
    }
}
