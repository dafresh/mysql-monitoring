<?php

/**
 * Warning: Ugly code here
 */

/**
 * @param int $length
 * @return string
 */
function generateRandomString($length = 100): string
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

define('INSERT_BATCH_SIZE', 5000);
define('BIG_TABLE_RECORDS', 3000000);
define('SMALL_TABLE_RECORDS', 100000);

$pdo = new PDO('mysql:host=playground-db;dbname=playground-db', 'root');

insertIntoTable($pdo, 'test_table_big', BIG_TABLE_RECORDS, INSERT_BATCH_SIZE);
insertIntoTable($pdo, 'test_table_small', SMALL_TABLE_RECORDS, INSERT_BATCH_SIZE);

function insertIntoTable(PDO $pdo, string $tableName, int $recordsCount, int $insertBatchSize) {

    $stmt = $pdo->prepare("INSERT INTO $tableName (number, string_short, string_long) VALUES (?, ?, ?)");
    $steps = $recordsCount / $insertBatchSize;

    for ($j = 1; $j <= $steps; $j++) {
        echo "Step: $j of $steps" . PHP_EOL;
        $values = [];
        for ($i = 0; $i < $insertBatchSize; $i++) {
            $values[] = [
                rand(1, 100),
                generateRandomString(5),
                generateRandomString(500),
            ];
        }
        $pdo->beginTransaction();
        foreach ($values as $row) {
            $stmt->execute($row);
        }
        $pdo->commit();
    }
}
