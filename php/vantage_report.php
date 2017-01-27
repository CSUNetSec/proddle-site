<?php
$now = time();
$yesterday = $now - (24 * 60 * 60);

echo '{"Timestamp":' . $now . ',"Vantages":[';

//open driver manager
$manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');

//query for distinct hostnames
$cursor = $manager->executeCommand(
    'proddle',
    new MongoDB\Driver\Command(
        [
            'distinct' => 'results',
            'key' => 'Hostname',
            'query' => ['Timestamp' => ['$gte' => $yesterday]]
        ]
    )
);

//iterate over distinct hostnames
$array = $cursor->toArray()[0]->values;
for ($i=0; $i < count($array); ++$i) {
    $hostname = $array[$i];

    echo ($i != 0 ? ',' : '') . '{"Hostname":"'. $hostname . '"';

    //query for distinct ip addresses
    echo ',"IpAddresses":[';

    $ipCursor = $manager->executeCommand(
        'proddle',
        new MongoDB\Driver\Command(
            [
                'distinct' => 'results',
                'key' => 'IpAddress',
                'query' => ['Timestamp' => ['$gte' => $yesterday], 'Hostname' => $hostname]
            ]
        )
    );

    //iterate over ip addresses
    $ipArray = $ipCursor->toArray()[0]->values;
    for ($j=0; $j < count($ipArray); ++$j) {
        $ipAddress = $ipArray[$j];

        //TODO geolocation ip address

        echo ($j != 0 ? ',' : '') . '{"IpAddress":"'. $ipAddress . '"}';
    }

    echo ']';

    //query for distinct measurements
    echo ',"Measurements":[';

    $measurementCursor = $manager->executeCommand(
        'proddle',
        new MongoDB\Driver\Command(
            [
                'distinct' => 'results',
                'key' => 'Measurement',
                'query' => ['Timestamp' => ['$gte' => $yesterday], 'Hostname' => $hostname]
            ]
        )
    );

    //iterate over measurements
    $measurementArray = $measurementCursor->toArray()[0]->values;
    for ($j=0; $j < count($measurementArray); ++$j) {
        $measurement = $measurementArray[$j];

        //query for measurement count
        $countCursor = $manager->executeCommand(
            'proddle',
            new MongoDB\Driver\Command(
                [
                    'count' => 'results',
                    'query' => ['Timestamp' => ['$gte' => $yesterday], 'Hostname' => $hostname, 'Measurement' => $measurement]
                ]
            )
        );

        $countArray = $countCursor->toArray();

        echo ($j != 0 ? ',' : '') . '{"Measurement":"'. $measurement . '","Count":' . $countArray[0]->n . '}';
    }

    echo ']}';
}

echo ']}';
?>
