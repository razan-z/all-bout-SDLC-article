<?php
require_once("../../connection/connection.php");
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

    public static function readUser($conn, $email, $password)
    {
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {

            $data = $result->fetch_assoc();
            if (password_verify($password, $data['password'])) {
                $user = new UserSkeleton();
                $user->setId($data['id']);
                $user->setFullName($data['full_name']);
                $user->setEmail($data['email']);
                $user->setPassword($data['password']);
                return $user;
            }
        }
        return null;
    }
}
