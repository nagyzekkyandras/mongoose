<?php
require_once 'vendor/autoload.php';
require_once 'libs/page.php';
require_once 'libs/check-session.php';
require_once 'libs/db-connect.php';
pageHeader();

try {
    $statement = $conn->executeQuery('SELECT permission FROM users WHERE email = ?', array($_SESSION['email']));
    $user = $statement->fetch();
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
    header("location: error.html");
}

if ($user['permission'] == 'admin') {
    pageNavbarAdmin();
} else {
    pageNavbarUser();
}

pageFooter();
