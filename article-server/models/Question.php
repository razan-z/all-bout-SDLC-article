<?php

require_once("../connection/connection.php");
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

    public static function readQuestions($conn, $searchInput)
    {
        $searchTerm = "%" . $searchInput . "%";
        $query = "SELECT * FROM questions WHERE question LIKE ? OR answer LIKE ? ";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $searchTerm, $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $questions = [];
            while ($row = $result->fetch_assoc()) {
                $question = new QuestionSkeleton();
                $question->setId($row['id']);
                $question->setQuestion($row['question']);
                $question->setAnswer($row['answer']);
                $questions[] = $question;
            }
            return $questions;
        }
    }
}
