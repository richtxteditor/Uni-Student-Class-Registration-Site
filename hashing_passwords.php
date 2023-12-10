<?php
include_once "config.php";

$admins = [
    ['Wanda', 'silvaw2', '123456'],
    ['Nathan', 'williamsn12', '78910'],
    ['Richie', 'molinar4', '23489'],
];

foreach ($admins as $admin) {
    $name = $admin[0];
    $username = $admin[1];
    $password = $admin[2];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    // You can use these hashed passwords in your SQL INSERT statements
    echo "INSERT INTO admins (admin_name, admin_username, admin_password) VALUES ('$name', '$username', '$hashedPassword');\n";
}

?>