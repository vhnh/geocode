<?php

namespace Vhnh\Geocode;

use Vhnh\Geocode\Contracts\Address;

abstract class Request
{
    protected $address;

    public function __construct(Address $address)
    {
        $this->address = $address;
    }
}
