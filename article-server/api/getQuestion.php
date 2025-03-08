<?php
require_once("../connection/connection.php");
require_once("../models/Question.php");

$searchInput = $_POST['searchInput'] ?? ' ';

$results = Question::readQuestions($conn, $searchInput);

echo json_encode($results);
