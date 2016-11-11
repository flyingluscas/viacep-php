<?php

namespace FlyingLuscas\ViaCEP;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Handler\MockHandler;

class ZipCodeTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_find_address()
    {
        $stub = $this->makeAddress();

        $mock = new MockHandler([
            new Response(200, [], json_encode($stub)),
        ]);

        $client = new Client([
            'handler' => HandlerStack::create($mock),
        ]);

        $address = (new ZipCode($client))->find('99999-999');

        $this->assertInstanceOf(Address::class, $address);
        $this->assertEquals($stub['cep'], $address->zipCode);
    }
}
