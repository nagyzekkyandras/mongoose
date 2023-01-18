<?php

session_start();
if(!isset($_SESSION['email']) OR empty($_SESSION['email'])) {
    header('location:login.php');
}

?>