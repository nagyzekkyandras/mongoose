<?php
require_once 'vendor/autoload.php';
require_once 'libs/check-session.php';
require_once 'libs/db-connect.php';
require_once 'libs/page.php';
page_header();
page_navbar();

$statement = $conn->executeQuery('SELECT email,name FROM users WHERE email = ?', array($_SESSION['email']));
$user = $statement->fetch();

echo '<p>Email: ' . $user['email'] . '</p>';
echo '<p>Name: ' . $user['name'] . '</p>';

page_footer();
?>