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
        return $this->conn->executeUpdate($query, array($_POST["password1"], $_SESSION['email']));
    }

    public function updateLastLogin()
    {
        $query = 'UPDATE users SET last_login = ? WHERE email = ?';
        return $this->conn->executeUpdate($query, array(date("Y-m-d"), $_SESSION['email']));
    }

    public function checkDb()
    {
        $query = 'SELECT count(id) FROM users';
        $statement = $this->conn->executeQuery($query);
        return $statement->fetch();
    }

    public function checkUserExists()
    {
        $query = $this->conn->createQueryBuilder()
                        ->select('COUNT(id) as count')
                        ->from('users')
                        ->where('password = :password')
                        ->andWhere('email = :email')
                        ->setParameter('email', $_POST['email'])
                        ->setParameter('password', $_POST['password']);
        // First element's value
        return $query->execute()->fetch();
    }

    public function checkUserEmail()
    {
        $query = $this->conn->createQueryBuilder()
                      ->select('COUNT(id) as count')
                      ->from('users')
                      ->where('email = :email')
                      ->setParameter('email', $_SESSION['email']);
        return $query->execute()->fetch();
    }

    public function adminListUsers()
    {
        $query = "SELECT id,name,email,auth_type,permission,create_date,last_login FROM users";
        $stmt = $this->conn->prepare($query);
        $resultSet = $stmt->executeQuery();
        return $resultSet->fetchAllAssociative();
    }

    public function adminListGitlabs()
    {
        $query = "SELECT id,name,url FROM gitlab";
        $stmt = $this->conn->prepare($query);
        $resultSet = $stmt->executeQuery();
        return $resultSet->fetchAllAssociative();
    }

    public function adminListNexus()
    {
        $query = "SELECT id,name,username,url,create_date FROM nexus";
        $stmt = $this->conn->prepare($query);
        $resultSet = $stmt->executeQuery();
        return $resultSet->fetchAllAssociative();
    }

    public function createNewGoogleUser()
    {
        $this->conn->insert('users', array('name' => $_SESSION['name'],
                            'email' => $_SESSION['email'],
                            'auth_type' => 'Google',
                            'permission' => 'user',
                            'create_date' => date("Y-m-d"),
                            'last_login' => date("Y-m-d")));
    }

}
