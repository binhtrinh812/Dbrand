<?php
include_once '../configs/Connect.php';
class User extends Connect
{
    public function __construct()
    {
        parent::__construct();
    }

    public function showUserByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE users.email = :email";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':email', $email);
        $pre->execute();
        return $pre->fetch(PDO::FETCH_ASSOC);
    }

    public function addUser($email, $password, $name)
    {
        $sql = "INSERT INTO `users` (`email`, `password`, `name`) VALUES (:email, :password, :name)";
        $pre= $this->pdo->prepare($sql);
        $pre->bindParam(':email', $email);
        $pre->bindParam(':password', $password);
        $pre->bindParam(':name', $name);
        return $pre->execute();
    }

    public function login($email, $password)
    {
        $sql = "SELECT *FROM users WHERE email = :email and password = :password";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':email', $email);
        $pre->bindParam(':password', $password);
        $pre->execute();
        return $pre->fetch(PDO::FETCH_ASSOC);
    }
    
}