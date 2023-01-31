<?php
require_once 'vendor/autoload.php';
require_once 'libs/page.php';

$session = new Session();
$database = new Database();

$conn = $database->getConnection();
$session -> checkSession();

pageHeader();

try {
    $result = $database->getUserData();
    if ($result['permission'] == 'admin') {
        pageNavbarAdmin();
    } else {
        pageNavbarUser();
        // if you have no permission redirect to the index page
        header("location: index.php");
    }
} catch (Exception $e) {
    echo $error,  $e->getMessage(), "\n";
    header("location: error.html");
}

echo '<div>';
$result = $database->adminListUsers();
htmlTable($result);
echo '</div>';
pageFooter();
