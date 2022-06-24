<?php


namespace App\Services;


class Coordinates
{
    public float $lat;
    public float $lng;

    public function __construct(object $coordinate)
    {
        $this->lat = $coordinate->lat;
        $this->lng = $coordinate->lng;
    }
}
