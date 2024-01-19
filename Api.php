<?php
class Api
{
    private $apiUrl;

    public function __construct($apiUrl)
    {
        $this->apiUrl = $apiUrl;
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
        $url =
            $this->apiUrl .
            "/reverse.php?key=pk.df450a16a87be38488b15c935ace671d&lat=$latitude&lon=$longitude&format=json";

        $response = $this->makeRequest($url);

        $data = json_decode($response, true);

        $location = new Location($data["display_name"], $latitude, $longitude);

        return $location;
    }

    public function getCoordinatesByAddress($address)
    {
        $encodedAddress = urlencode($address);

        $url =
            $this->apiUrl .
            "/search.php?key=pk.df450a16a87be38488b15c935ace671d&q=$encodedAddress&format=json";

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
