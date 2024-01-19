<?php

require_once "Location.php";
require_once "Api.php";
require_once "RequestHandler.php";

$apiUrl = "https://eu1.locationiq.com/v1";
$Api = new Api($apiUrl);
$requestHandler = new RequestHandler($Api);

$location1 = $requestHandler->getAddressByCoordinates(53.358013, 83.682602);
$location2 = $requestHandler->getCoordinatesByAddress(
    "Барнаульский зоопарк, Барнаул"
);

echo "Location 1:\n";
printf(
    "Address: %s\nLatitude: %f\nLongitude: %f\n",
    $location1->address,
    $location1->latitude,
    $location1->longitude
);

echo "\nLocation 2:\n";
printf(
    "Address: %s\nLatitude: %f\nLongitude: %f\n",
    $location2->address,
    $location2->latitude,
    $location2->longitude
);
