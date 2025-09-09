<?php
// database_config.php

$host = 'localhost';
$db   = 'indegnnk_nyasajob';
$user = 'indegnnk_nyasajob';
$pass = '0Emphxalmeda@@';
$charset = 'utf8mb4';

// DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// PDO Options
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Error reporting
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Fetch mode
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Prepared statements
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Handle error
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
