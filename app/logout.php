<?php
require_once 'vendor/autoload.php';
$session = new Session();
$session -> deleteSession();
header('location:login.php');
