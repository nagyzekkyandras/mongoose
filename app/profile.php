<?php
require_once 'vendor/autoload.php';
require_once 'libs/check-session.php';
require_once 'libs/db-connect.php';
require_once 'libs/page.php';
page_header();
$statement = $conn->executeQuery('SELECT permission FROM users WHERE email = ?', array($_SESSION['email']));
$user = $statement->fetch();

if($user['permission'] == 'admin'){
    page_navbar_admin();
} else {
    page_navbar_user();
}

$statement = $conn->executeQuery('SELECT email,name,permission FROM users WHERE email = ?', array($_SESSION['email']));
$user = $statement->fetch();

echo '<p>Email: ' . $user['email'] . '</p>';
echo '<p>Name: ' . $user['name'] . '</p>';
echo '<p>Permission: ' . $user['permission'] . '</p>';


page_footer();
?>