<?php

namespace Vhnh\Geocode\Contracts;

interface Address
{
    public function streetAddress();

    public function city();
    
    public function postCode();

    public function country();
}
