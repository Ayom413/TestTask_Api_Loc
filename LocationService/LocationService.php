<?php

namespace LocationService;

use Location\Location;
use GetApiToken\GetApiToken;

class LocationService
{
    private $apiUrl;
    private $apiToken;

    public function __construct()
    {
        $this->apiUrl = "https://eu1.locationiq.com/v1";
        $this->apiToken = new GetApiToken();
    }

    private function makeRequest($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    public function getAddressByCoordinates($latitude, $longitude)
    {
        $url = "{$this->apiUrl}/reverse.php?key={$this->apiToken->getToken()}&lat=$latitude&lon=$longitude&format=json";

        $response = $this->makeRequest($url);
        $data = json_decode($response, true);

        $location = new Location($data["display_name"], $latitude, $longitude);

        return $location;
    }

    public function getCoordinatesByAddress($address)
    {
        $encodedAddress = urlencode($address);
        $url = "{$this->apiUrl}/search.php?key={$this->apiToken->getToken()}&q=$encodedAddress&format=json";

        $response = $this->makeRequest($url);
        $data = json_decode($response, true);

        $firstResult = $data[0];

        $location = new Location(
            $firstResult["display_name"],
            $firstResult["lat"],
            $firstResult["lon"]
        );

        return $location;
    }
}
