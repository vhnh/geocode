<?php

namespace Vhnh\Geocode\Tests;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return ['Vhnh\Geocode\ServiceProvider'];
    }
}
