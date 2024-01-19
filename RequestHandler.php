<?php
class RequestHandler
{
    private $mapApi;

    public function __construct(Api $mapApi)
    {
        $this->mapApi = $mapApi;
    }

    public function getAddressByCoordinates($latitude, $longitude)
    {
        return $this->mapApi->getAddressByCoordinates($latitude, $longitude);
    }

    public function getCoordinatesByAddress($address)
    {
        return $this->mapApi->getCoordinatesByAddress($address);
    }
}
