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
     * Creta a new ZipCode class instance.
     *
     * @param \GuzzleHttp\ClientInterface $http
     */
    public function __construct(ClientInterface $http = null)
    {
        $this->http = $http ?: new Client;
        $this->address = new Address;
    }

    /**
     * Find the proper addres for the given zip code.
     *
     * @param  string $zipCode
     *
     * @return \FlyingLuscas\ViaCEP\Address
     */
    public function find($zipCode)
    {
        $response = $this->http->request('POST', '//viacep.com.br/ws/'.$zipCode.'/json');
        $attributes = json_decode($response->getBody(), true);

        if (array_key_exists('erro', $attributes) && $attributes['erro'] === true) {
            return $this->address;
        }

        return $this->address->fill($attributes);
    }
}
