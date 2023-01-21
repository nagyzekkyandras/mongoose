<?php
require_once 'vendor/autoload.php';
require_once 'libs/page.php';
require_once 'libs/check-session.php';
require_once 'libs/db-connect.php';
page_header();

$statement = $conn->executeQuery('SELECT permission FROM users WHERE email = ?', array($_SESSION['email']));
$user = $statement->fetch();

if($user['permission'] == 'admin'){
    page_navbar_admin();
} else {
    page_navbar_user();
}
page_footer();
?>