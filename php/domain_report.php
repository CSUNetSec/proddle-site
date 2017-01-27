<?php
require_once 'vendor/autoload.php';

$yesterday = time() - (24 * 60 * 60);

//open driver manager and geoip reader
$manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
$reader = new GeoIp2\Database\Reader('/usr/local/share/GeoLite2/GeoLite2-City.mmdb');

//query for results
$cursor = $manager->executeQuery(
    'proddle.results',
    new MongoDB\Driver\Query(
        ['Timestamp' => ['$gte' => $yesterday]],
        ['sort' => ['Timestamp' => -1]]
    )
);

//iterate over results
$array = $cursor->toArray();
for ($i=0; $i < count($array); ++$i) {
    $result = $array[$i];

    //gelocate ip address
    $record = $reader->city($result->IpAddress);

    $result->Latitude = $record->location->latitude;
    $result->Longitude = $record->location->longitude;
}

echo MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($array));
?>
