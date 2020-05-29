<?php

/**
 * Warning: Ugly code here
 */

define('BAD_QUERY_RUN_COUNT', 30);

$pdo = new PDO("mysql:host=playground-db;dbname=playground-db", 'root');
$stmt = $pdo->prepare("SELECT * FROM test_table_big WHERE number = ? ORDER BY number LIMIT 20000");

for($i = 1; $i <= BAD_QUERY_RUN_COUNT; $i++) {
    echo "Step: $i of ". BAD_QUERY_RUN_COUNT . PHP_EOL;
    $timeStart = microtime(true);

    $params = [rand(1,100)];

    if ($stmt->execute($params)) {
        while ($row = $stmt->fetch()) {}
    }

    echo 'Query finished in: ' . (microtime(true) - $timeStart) . PHP_EOL . PHP_EOL;
}
