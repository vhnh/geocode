<?php

namespace Vhnh\Geocode\Tests;

use Illuminate\Support\Facades\Http;
use Vhnh\Geocode\Tests\Fakes\Address;
use Vhnh\Geocode\Providers\Google\Request;

class GoogleProviderTest extends TestCase
{
    protected $response = [
        'results' => [
            [
                'geometry' => [
                    'location' => [
                        'lat' => 53.5976795,
                        'lng' => 9.9162463,
                    ]
                ]
            ]
        ]
    ];

    
    /** @test */
    public function it_geocodes_an_address()
    {
        Http::fake([
            'maps.googleapis.com/*' => Http::response($this->response, 200),
        ]);

        $request = new Request(new Address);

        $response = $request->handle();

        $this->assertEquals(53.5976795, $response->latitude());
        $this->assertEquals(9.9162463, $response->longitude());
    }
}
