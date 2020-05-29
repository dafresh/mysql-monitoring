<?php

/**
 * Warning: Ugly code here
 */

define('BAD_QUERY_RUN_COUNT', 50);

$pdo = new PDO("mysql:host=playground-db;dbname=playground-db", 'root');

for($i = 1; $i <= BAD_QUERY_RUN_COUNT; $i++) {
    echo "Step: $i of ". BAD_QUERY_RUN_COUNT . PHP_EOL;
    $timeStart = microtime(true);

    $number = rand(1,10);
    $query = "SELECT AVG(number) FROM test_table_small WHERE number = $number";
    $pdo->query($query);

    echo 'Query finished in: ' . (microtime(true) - $timeStart) . PHP_EOL . PHP_EOL;
    sleep(1);
}
