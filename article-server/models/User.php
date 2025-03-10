<?php
require_once("../connection/connection.php");
require_once("UserSkeleton.php");

class User
{
    public static function createUser($conn, $fullName, $email, $password)
    {
        $hashed_password = hash('sha256', $password);
        $query = "INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $fullName, $email, $hashed_password);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public static function readUserByEmail($conn, $email)
    {
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {

            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    public static function readUser($conn, $email, $password)
    {

        $data = self::readUserByEmail($conn, $email);
        if ($data) {
            $hashed_input_password = hash('sha256', $password);
            if (hash_equals($hashed_input_password, $data['password'])) {
                $user = new UserSkeleton($data['id'], $data['full_name'], $data['email'], $data['password']);
                return $user;
            } else {
                return false;
            }
        }
    }
}
