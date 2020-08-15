<?php

namespace Vhnh\Geocode;

use Vhnh\Geocode\Contracts\Address;
use Illuminate\Support\Facades\Http;

abstract class Request
{
    protected $address;

    protected $attemps;

    public function __construct(Address $address, int $attemps = 3)
    {
        $this->address = $address;
        $this->attemps = $attemps;
    }

    protected function http()
    {
        return Http::retry($this->attemps, 300);
    }
}
