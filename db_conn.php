<?php

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory)
    ->withServiceAccount('db-pharmacy-firebase-adminsdk-hnyzx-faa094957d.json')
    ->withDatabaseUri('https://db-pharmacy-default-rtdb.firebaseio.com/');

    $database = $factory->createDatabase();
?>  