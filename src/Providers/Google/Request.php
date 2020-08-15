<?php

namespace Vhnh\Geocode\Providers\Google;

use Vhnh\Geocode\Request as GeocodeRequest;
use Vhnh\Geocode\Contracts\Request as GeocodeRequestContract;
use Vhnh\Geocode\Contracts\Response as GeocodeResponseContract;

class Request extends GeocodeRequest implements GeocodeRequestContract
{
    public function handle() : GeocodeResponseContract
    {
        $response = $this->http()->get('https://maps.googleapis.com/maps/api/geocode/json', [
            'address' => $this->addressParamter(),
            'key' => config('geocode.google.key'),
        ]);

        $response->throw();

        return new Response($response->json());
    }

    public function addressParamter()
    {
        return urlencode(
            sprintf("%s, %s %s, %s", $this->address->streetAddress(), $this->address->postCode(), $this->address->city(), $this->address->country())
        );
    }
}
