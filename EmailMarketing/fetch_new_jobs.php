<?php
// fetch_new_jobs.php

require 'database_config.php';

try {
    // Prepare SQL statement to fetch jobs less than 5 minutes old
    $stmt = $pdo->prepare("
        SELECT id, title, description, created_at, country_code
        FROM posts
        WHERE created_at >= NOW() - INTERVAL 1440 MINUTE
    ");
    $stmt->execute();

    // Fetch all new job posts
    $newJobs = $stmt->fetchAll();

} catch (\PDOException $e) {
    // Handle error
    echo "Database error: " . $e->getMessage();
    exit;
}
?>
