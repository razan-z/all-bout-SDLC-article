<?php
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json");


$host = "localhost";
$username = "root";
$password = "";
$db = "allboutSDLCarticle";

$conn = new mysqli($host, $username, $password, $db);
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}
