<?php

namespace Vhnh\Geocode\Tests\Fakes;

use Vhnh\Geocode\Contracts\Address as AddressContract;

class Address implements AddressContract
{
    public function streetAddress()
    {
        return "Kronsaalsweg 70";
    }

    public function city()
    {
        return "Hamburg";
    }
    
    public function postCode()
    {
        return 22525;
    }

    public function country()
    {
        return "Germany";
    }
}
