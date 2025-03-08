<?php
require("../../connection/connection.php");

$query = " CREATE TABLE IF NOT EXISTS users (
id INT(11) AUTO_INCREMENT PRIMARY KEY,
full_name VARCHAR(255) NOT NULL,
email VARCHAR(255) NOT NULL UNIQUE,
password VARCHAR(255) NOT NULL UNIQUE
)";

$result = mysqli_query($conn, $query);
if ($result) {
    echo "users table created successfully";
} else {
    echo "Error creating users table: " . mysqli_error($conn);
    exit();
}
