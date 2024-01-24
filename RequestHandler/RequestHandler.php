<?php

namespace RequestHandler;

use LocationService\LocationService;

class RequestHandler
{
    private $locationService;

    public function __construct()
    {
        $this->locationService = new LocationService();
    }

    public function getAddressByCoordinates($latitude, $longitude)
    {
        return $this->locationService->getAddressByCoordinates(
            $latitude,
            $longitude
        );
    }

    public function getCoordinatesByAddress($address)
    {
        return $this->locationService->getCoordinatesByAddress($address);
    }
}
