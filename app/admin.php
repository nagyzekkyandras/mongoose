<?php
require_once 'vendor/autoload.php';
require_once 'libs/page.php';
require_once 'libs/check-session.php';
require_once 'libs/db-connect.php';
page_header();
page_navbar();

echo '<div>';
$sql = "SELECT id,name,email,auth_type,permission,create_date,last_login FROM users";
$stmt = $conn->prepare($sql);
$resultSet = $stmt->executeQuery();
$users = $resultSet->fetchAllAssociative();
html_table($users);
echo '</div>';
page_footer();
?>