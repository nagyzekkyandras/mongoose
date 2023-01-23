<?php
require_once 'vendor/autoload.php';
require_once 'libs/page.php';
require_once 'libs/check-session.php';
require_once 'libs/db-connect.php';
page_header();

try {
    $statement = $conn->executeQuery('SELECT permission FROM users WHERE email = ?', array($_SESSION['email']));
    $user = $statement->fetch();
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
    header("location: error.html");
}

if ($user['permission'] != 'admin') { # if you have no permission redirect to the index page
    header("location: index.php");
}

if ($user['permission'] == 'admin') { # generate the navbar
    page_navbar_admin();
} else {
    page_navbar_user();
}

echo '<div>';
$sql = "SELECT id,name,email,auth_type,permission,create_date,last_login FROM users";
$stmt = $conn->prepare($sql);
$resultSet = $stmt->executeQuery();
$users = $resultSet->fetchAllAssociative();
html_table($users);
echo '</div>';
page_footer();
