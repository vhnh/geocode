<?php

namespace Vhnh\Geocode;

use Illuminate\Support\ServiceProvider as SupportServiceProvider;

class ServiceProvider extends SupportServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/geocode.php',
            'geocode'
        );
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/geocode.php' => config_path('geocode.php'),
        ]);
    }
}
