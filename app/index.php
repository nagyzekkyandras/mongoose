<?php
require_once 'vendor/autoload.php';
require_once 'libs/page.php';

$session = new Session();
$database = new Database();

$session -> checkSession();

pageHeader();

try {
    $conn = $database->getConnection();
    $result = $database->getUserData();

    if ($result['permission'] == 'admin') {
        pageNavbarAdmin();
    } else {
        pageNavbarUser();
    }
} catch (Exception $e) {
    echo $error,  $e->getMessage(), "\n";
    header("location: error.html");
}

pageFooter();
