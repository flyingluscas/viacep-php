<?php

namespace FlyingLuscas\ViaCEP;

use Mockery;
use PHPUnit_Framework_TestCase as PHPUnitTestCase;

abstract class TestCase extends PHPUnitTestCase
{
    /**
     * {@inheritdoc}
     */
    public function tearDown()
    {
        parent::tearDown();

        Mockery::close();
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
