<?php
// Turn off error displaying in production environment
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

session_start();

include_once 'config.php'; // Ensure this file has the correct PDO connection setup

// Validate and sanitize email and password
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8') : '';
$password = isset($_POST['password']) ? htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8') : '';


// CSRF token validation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        header("Location: /index.php?error=Invalid request.");
        exit();
    }

    // Regenerate CSRF token
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

    // Proceed with form processing
}

$stmt = $db_connection->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
$stmt->bindParam(':email', $email);
$stmt->execute();

if ($stmt->rowCount() == 1) {
    $user = $stmt->fetch();

    if (password_verify($password, $user['password'])) {
        // Regenerate session ID upon successful login
        session_regenerate_id();

        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['user_type'] = $user['user_type'];

        if ($user['user_type'] == "student") {
            header("Location: student_dash.php");
            exit();
        } else if ($user['user_type'] == "admin") {
            header("Location: admin_dashboard.php");
            exit();
        } else {
            header("Location: user_dashboard.php");
            exit();
        }
    } else {
        header("Location: /index.php?error=Invalid email or password.");
        exit();
    }
} else {
    header("Location: /index.php?error=Invalid email or password.");
    exit();
}

?>