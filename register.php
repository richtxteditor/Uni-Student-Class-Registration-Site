<?php

// Display errors for debugging purposes
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include your config.php file to use the existing PDO database connection
include_once 'config.php';

function isFormSubmitted() {
    return $_SERVER["REQUEST_METHOD"] == "POST";
}

function getUserInput() {
    return [
        'name' => $_POST['name'] ?? '',
        'username' => $_POST['username'] ?? '',
        'email' => $_POST['email'] ?? '',
        'password' => $_POST['password'] ?? '',
        'user_type' => $_POST['user_type'] ?? ''
    ];
}

function isUserExisting($db_connection, $username, $email) {
    $stmt = $db_connection->prepare("SELECT * FROM users WHERE username = :username OR email = :email");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    return $stmt->rowCount() > 0;
}

function registerUser($db_connection, $name, $username, $email, $password, $user_type) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $insertStmt = $db_connection->prepare("INSERT INTO users (name, username, email, password, user_type) VALUES (:name, :username, :email, :hashed_password, :user_type)");
    $insertStmt->bindParam(':name', $name);
    $insertStmt->bindParam(':username', $username);
    $insertStmt->bindParam(':email', $email);
    $insertStmt->bindParam(':hashed_password', $hashed_password);
    $insertStmt->bindParam(':user_type', $user_type);
    $insertStmt->execute();
}

if (!isFormSubmitted()) {
    // Handle case where form is not submitted
    exit;
}

$userInput = getUserInput();

if (isUserExisting($db_connection, $userInput['username'], $userInput['email'])) {
    // Redirect or display an error message
    exit;
}

registerUser($db_connection, $userInput['name'], $userInput['username'], $userInput['email'], $userInput['password'], $userInput['user_type']);
// Redirect to a success page or login page
?>


// Since PDO connection is not persistent, it's closed automatically when the script ends.
?>
