<?php
require_once 'vendor/autoload.php';
require_once 'libs/check-session.php';
require_once 'libs/db-connect.php';
require_once 'libs/page.php';
pageHeader();

try {
    $querry = 'SELECT email,name,permission FROM users WHERE email = ?';
    $statement = $conn->executeQuery($querry, array($_SESSION['email']));
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

echo '<p id="email">Email: ' . $user['email'] . '</p>';
echo '<p>Name: ' . $user['name'] . '</p>';
echo '<p>Permission: ' . $user['permission'] . '</p>';

pageFooter();
