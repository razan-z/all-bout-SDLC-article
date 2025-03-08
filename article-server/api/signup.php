<?php
require_once("../connection/connection.php");
require_once("../models/User.php");

if (empty($_POST['fullname']) || empty($_POST['email']) || empty($_POST['password'])) {
    echo json_encode([
        "status" => "error",
        "message" => "All fields are required"
    ]);
    exit();
}

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['password'];

$checkEmail = User::readUserByEmail($conn, $email);
if ($checkEmail) {
    echo json_encode([
        "status" => "error",
        "message" => "Email already exists"
    ]);
} else {
    $user = User::createUser($conn, $fullname, $email, $password);
    echo json_encode([
        "status" => "success",
        "message" => "User created successfully",
    ]);
}
