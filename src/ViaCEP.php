<?php

namespace FlyingLuscas\ViaCEP;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

class ViaCEP
{
    /**
     * HTTP client.
     *
     * @var \GuzzleHttp\Client
     */
    protected $http;

    /**
     * Creta a new ZipCode class instance.
     *
     * @param \GuzzleHttp\ClientInterface $http
     */
    public function __construct(ClientInterface $http = null)
    {
        $this->http = $http ?: new Client;
    }

    /**
     * Find address by zip code (CEP).
     *
     * @param  string $zipCode
     *
     * @return \FlyingLuscas\ViaCEP\Address
     */
    public function findByZipCode($zipCode)
    {
        $url = sprintf('https://viacep.com.br/ws/%s/json', $zipCode);

        $response = $this->http->request('GET', $url);

        $attributes = json_decode($response->getBody(), true);

        if (array_key_exists('erro', $attributes) && $attributes['erro'] === true) {
            return new Address;
        }

        return new Address($attributes);
    }

    /**
     * Find addresses by state, city and street name.
     *
     * @param  string $state
     * @param  string $city
     * @param  string $street
     *
     * @return \FlyingLuscas\ViaCEP\Address[]
     */
    public function findByStreetName($state, $city, $street)
    {
        $url = sprintf(
            'https://viacep.com.br/ws/%s/%s/%s/json',
            rawurlencode($state),
            rawurlencode($city),
            rawurlencode($street)
        );

        $response = $this->http->request('GET', $url);

        $results = json_decode($response->getBody(), true);

        if (array_key_exists('erro', $results) && $results['erro'] === true) {
            return [];
        }

        return array_map(function ($attributes) {
            return new Address($attributes);
        }, $results);
    }
}
