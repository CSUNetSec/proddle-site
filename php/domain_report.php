<?php
$yesterday = time() - (24 * 60 * 60);

//open driver manager
$manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');

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

    //TODO gelocate ip address

    $result->Latitude = 0;
}

echo MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($array));
?>
