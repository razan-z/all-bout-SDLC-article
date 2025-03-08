<?php
class UserSkeleton
{
    private $id;
    private $fullName;
    private $email;
    private $password;


    public function getId()
    {
        return $this->id;
    }

    public function getFullName()
    {
        return $this->fullName;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password->$password;
    }
}
