<?php
require_once 'vendor/autoload.php';
require_once 'libs/check-session.php';
require_once 'libs/db-connect.php';
require_once 'libs/page.php';
page_header();

try {
    $statement = $conn->executeQuery(
        'SELECT email,name,permission FROM users WHERE email = ?',array($_SESSION['email']));
    $user = $statement->fetch();
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
    header("location: error.html");
}

if ($user['permission'] == 'admin') {
    page_navbar_admin();
} else {
    page_navbar_user();
}

echo '<p id="email">Email: ' . $user['email'] . '</p>';
echo '<p>Name: ' . $user['name'] . '</p>';
echo '<p>Permission: ' . $user['permission'] . '</p>';

page_footer();
