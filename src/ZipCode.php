<?php

namespace FlyingLuscas\ViaCEP;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

class ZipCode
{
    /**
     * HTTP client.
     *
     * @var \GuzzleHttp\Client
     */
    protected $http;

    /**
     * Address.
     *
     * @var \FlyingLuscas\ViaCEP\Address
     */
    protected $address;

    /**
     * Addresses.
     *
     * @var \FlyingLuscas\ViaCEP\Address[]
     */
    protected $addresses;

    /**
     * Creta a new ZipCode class instance.
     *
     * @param \GuzzleHttp\ClientInterface $http
     */
    public function __construct(ClientInterface $http = null)
    {
        $this->http = $http ?: new Client(['verify' => false]);
        $this->address = new Address;
    }

    /**
     * Find the proper addres for the given zip code.
     *
     * @param  string $zipCode
     *
     * @return \FlyingLuscas\ViaCEP\Address
     */
    public function findByCep($zipCode)
    {
        $this->address = new Address; // clear variables

        try {
            $response = $this->http->request('GET', 'https://viacep.com.br/ws/' . $zipCode . '/json');
            $attributes = json_decode($response->getBody(), true);

            if (array_key_exists('erro', $attributes) && $attributes['erro'] === true) {
                return $this->address;
            }
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            return $this->address;
        }


        return $this->address->fill($attributes);
    }

    /**
     * Find the proper addres for the given zip code.
     *
     * @param  string $zipCode
     *
     * @return \FlyingLuscas\ViaCEP\Address
     * @deprecated v1.1.0 Use findByCep instead.
     */
    public function find($zipCode)
    {
        return $this->findByCep($zipCode); // keeping compatibility
    }

    /**
     * Find the proper address for the given address (State, City, Street).
     *
     * @param  string $state   Estado do endereço completo a ser localizado.
     * @param  string $city    Cidade do endereço completo a ser localizada.
     * @param  string $address Endereço a localizar (rua, praça, etc.)
     *
     * @return \FlyingLuscas\ViaCEP\Address[]
     */
    public function findByAddress($state, $city, $address)
    {
        $this->addresses = []; // clear variables
        try {
            $response = $this->http->request(
                'GET',
                rawurldecode('https://viacep.com.br/ws/'.$state.'/'.$city.'/'.$address.'/json')
            );
            $results = json_decode($response->getBody(), true);

            if (array_key_exists('erro', $results) && $results['erro'] === true) {
                return $this->addresses;
            } else {
                foreach ($results as $attributes) {
                    $address = new Address;
                    $address->fill($attributes);
                    $this->addresses[] = $address;
                }
            }
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            return $this->addresses;
        }

        return $this->addresses;
    }
}
