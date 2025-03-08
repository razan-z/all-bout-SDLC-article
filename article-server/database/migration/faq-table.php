<?php
require("../../connection/connection.php");

$query = "CREATE TABLE IF NOT EXISTS questions(
id INT(11) AUTO_INCREMENT PRIMARY KEY,
question VARCHAR(255) NOT NULL,
answer TEXT NOT NULL
) ";

$result = mysqli_query($conn, $query);
if ($result) {
    echo "faqs table created successfully";
} else {
    echo "Error creating fqas table:" . mysqli_error($conn);
    exit();
}
