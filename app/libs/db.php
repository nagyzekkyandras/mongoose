<?php

use Doctrine\DBAL\DriverManager;

class Database
{
    private $conn;
    
    public function __construct()
    {
        $dbParams = [
            'dbname' => getenv('DB_NAME'),
            'user' => getenv('DB_USERNAME'),
            'password' => getenv('DB_PASSWORD'),
            'host' => getenv('DB_HOST'),
            'port' => getenv('DB_PORT'),
            'driver' => getenv('DB_DRIVER'),
        ];
        $this->conn = DriverManager::getConnection($dbParams);
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function getUserData()
    {
        $query = 'SELECT email,name,permission,auth_type,create_date FROM users WHERE email = ?';
        $statement = $this->conn->executeQuery($query, array($_SESSION['email']));
        return $statement->fetch();
    }

    public function updatePassword()
    {
        $query = 'UPDATE users SET password = ? WHERE email = ?';
        return $count = $this->conn->executeUpdate($query, array($_POST["password1"], $_SESSION['email'])); // 1
    }

}
