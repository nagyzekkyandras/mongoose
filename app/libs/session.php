<?php

class Session
{

    public function __construct()
    {
        session_start();
    }

    public function checkSession()
    {
        if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
            header('location:login.php');
        }
    }

    public function deleteSession()
    {
        session_destroy();
        header('location:login.php');
    }
}
