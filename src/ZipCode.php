<?php

namespace FlyingLuscas\ViaCEP;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
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
     * Creta a new ZipCode class instance.
     *
     * @param \GuzzleHttp\ClientInterface $http
     */
    public function __construct(ClientInterface $http = null)
    {
        $this->http = $http ?: new Client;
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

        return (new Address)->assign($attributes);
    }
}
