<?php

require_once("../../connection/connection.php");
require_once("QuestionSkeleton.php");

class Question
{
    //create a question
    public static function createQuestion($conn, $question, $answer)
    {
        $query = "INSERT INTO questions (question, answer) VALUES (?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $question, $answer);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public static function readQuestions($conn)
    {
        $query = "SELECT * FROM questions";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        $questions = [];
        while ($row = $result->fetch_assoc()) {
            $questions = new QuestionSkeleton();
            $questions->setId($row['id']);
            $questions->setQuestion($row['question']);
            $questions->setAnswer($row['answer']);
        }
        return $questions;
    }
}
