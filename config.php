<?php

// DB credentials
$host = "localhost";
$user = "root";
$password = "";
$database = "student_reg";

// Set DSN for the PDO connection
$dsn = "mysql:host=$host;dbname=$database";

try {
    // Create a PDO connection
    $db_connection = new PDO($dsn, $user, $password);
    // Set the PDO error mode to exception
    $db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Connected successfully";
} catch(PDOException $e) {
    // Handle connection error
    die("Connection failed: " . $e->getMessage());
}
?>
