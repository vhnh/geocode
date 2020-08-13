<?php

namespace Vhnh\Geocode\Contracts;

interface Request
{
    public function handle() : Response;
}
