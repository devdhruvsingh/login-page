<?php
require 'vendor/autoload.php';

try {
    // Change 'localhost' to 'mongodb' (matching your Docker service name)
    $client = new MongoDB\Client("mongodb://mongodb:27017");
    
    $db = $client->user_db;
    $usersCollection = $db->users;
} catch (Exception $e) {
    die("Database Connection Error: " . $e->getMessage());
}
?>