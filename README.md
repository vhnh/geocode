![VHNH](https://avatars3.githubusercontent.com/u/66573047?s=200)

# vhnh/geocode

The Vhnh Geocode package allows geocoding addresses within your [Laravel](https://github.com/laravel/laravel) application.

![tests](https://github.com/vhnh/geocode/workflows/tests/badge.svg)

## Setup

First you'll authorize your geocoding provider. Currently this package provides a provider for "Google Maps" but writing your own providers is pretty easy.

## Geocoding Addresses

The `Vhnh\Geocode\Request` accepts an object which implements the `Vhnh\Geocode\Contracts\Address` as its first argument in its constructor. Optionally you may settings the number of attemps as the second constructor parameter.

```php
<?php

namespace App\Jobs;

use App\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Vhnh\Geocode\Providers\Google\Request as GeocodeRequest;

class Geocode implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    protected $address;

    public function __construct(Address $address)
    {
        $this->address = $address;
    }

    public function handle()
    {
        $response = (
            new GeocodeRequest($this->address)
        )->handle();

        // ...
    }
}

```

## The Response

The `handle` method should return `Vhnh\Geocode\Contracts\Ressponse` which must implement a `longitude` and a `latitude` method.

```php

$response = $request->handle();

$address->update([
    'latitude' => $response->latitude(),
    'longitude' => $response->longitude()
]);

```

## License
The Vhnh Geocode package is open-sourced software licensed under the [MIT](http://opensource.org/licenses/MIT) license.
