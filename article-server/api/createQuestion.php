<?php
require_once("../connection/connection.php");
require_once("../models/Question.php");

if (empty($_POST['question']) || empty($_POST['answer'])) {
    echo json_encode([
        "status" => "error",
        "message" => "Please fill in all fields"
    ]);
    exit();
}

$question = $_POST['question'];
$answer = $_POST['answer'];
if (Question::createQuestion($conn, $question, $answer)) {
    echo json_encode([
        "status" => "success",
        "message" => "Your FAQ created successfully"
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Failed to create ur FAQ"
    ]);
}
