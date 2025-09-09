<?php
// fetch_emails.php

require 'database_config.php';

try {
    // Prepare SQL statement
    $stmt = $pdo->prepare("SELECT email, name, country_code FROM users WHERE accept_marketing_offers = 1");
    $stmt->execute();
    
    // Fetch all user emails
    $users = $stmt->fetchAll();

    // Option 1: Use print_r() to display the array structure
    echo "<pre>";
    print_r($users);
    echo "</pre>";

    // Option 2: Loop through the array and print each user's email and name
    /*
    foreach ($users as $user) {
        echo "Email: " . $user['email'] . " - Name: " . $user['name'] . "<br>";
    }
    */

} catch (\PDOException $e) {
    // Handle error
    echo "Database error: " . $e->getMessage();
    exit;
}
?>
