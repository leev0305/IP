<?php
require_once 'Database.php'; 

try {
    // Attempt to get the database connection
    $db = Database::getInstance();
    echo "Database connection is successful.";
} catch (Exception $e) {
    // Print the error message if connection fails
    echo "Failed to connect to the database: " . $e->getMessage();
}