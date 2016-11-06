<?php

namespace FlyingLuscas\ViaCEP;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class ZipCode
{
    /**
     * Find the proper addres for the given zip code.
     *
     * @param  string $zipCode
     *
     * @return \FlyingLuscas\ViaCEP\Address
     */
    public function find($zipCode)
    {
        $http = new Client;
        $request = new Request('get', '//viacep.com.br/ws/'.$zipCode.'/json');
        $response = $http->send($request);
        $attributes = json_decode($response->getBody(), true);

        return (new Address)->assign($attributes);
    }
}
