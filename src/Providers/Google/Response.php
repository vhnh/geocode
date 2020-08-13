<?php

namespace Vhnh\Geocode\Providers\Google;

use Illuminate\Support\Arr;
use Vhnh\Geocode\Contracts\Response as GeocodeResponseContract;

class Response implements GeocodeResponseContract
{
    protected $attributes;

    public function __construct($attributes)
    {
        $this->attributes = $attributes;
    }

    public function latitude()
    {
        return $this->getResult('geometry.location.lat', null);
    }

    public function longitude()
    {
        return $this->getResult('geometry.location.lng', null);
    }

    protected function getResult($key, $default)
    {
        return Arr::get(Arr::first($this->attributes['results']), $key, $default);
    }
}
