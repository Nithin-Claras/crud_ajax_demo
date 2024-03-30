<?php

$address = "1600 Amphitheatre Parkway, Mountain View, CA";
$url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($address) . "&key=AIzaSyDHN1eXoIBAnZTWH4WutZCL3bjuZ3ZzCzY";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$response = curl_exec($ch);
curl_close($ch);

$response_a = json_decode($response);
print_r($response_a);

$lat = $response_a->results[0]->geometry->location->lat;
$lng = $response_a->results[0]->geometry->location->lng;

echo '<br/>Given address: '.$address; 
echo '<br/>Latitude: '.$lat; 
echo '<br/>Longitude: '.$lng;