<?php
class RequestHandler
{
    private $Api;

    public function __construct(Api $Api)
    {
        $this->Api = $Api;
    }

    public function getAddressByCoordinates($latitude, $longitude)
    {
        return $this->Api->getAddressByCoordinates($latitude, $longitude);
    }

    public function getCoordinatesByAddress($address)
    {
        return $this->Api->getCoordinatesByAddress($address);
    }
}
