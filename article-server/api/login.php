<?php
require_once "../connection/connection.php";
require_once("../models/User.php");

if (empty($_POST["email"]) || empty($_POST["password"])) {
    echo json_encode([
        "status" => "error",
        "message" => "Email and password are required fields"
    ]);
    exit();
}

$email = $_POST['email'];
$password = $_POST["password"];

try {
    $user = User::readUser($conn, $email, $password);

    if ($user) {
        echo json_encode([
            "status" => "success",
            "message" => "User login succesfully",
            "user" => [
                "id" => $user->getId(),
                "email" => $user->getEmail(),
                "fullName" => $user->getFullName(),
                "password" => $user->getPassword()
            ]
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Invalid email or password"
        ]);
    }
} catch (\Throwable $e) {
    http_response_code(400);

    echo json_encode([
        "status" => "error",
        "message" => $e
    ]);
}
