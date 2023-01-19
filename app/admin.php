<?php
require_once 'libs/header.php';
require_once 'libs/check-session.php';
require_once 'libs/navbar.php';

require_once 'vendor/autoload.php';

require_once 'libs/db-connect.php';

echo '<div>';
$sql = "SELECT id,name,email,auth_type,permission,create_date,last_login FROM users";
$stmt = $conn->prepare($sql);
$resultSet = $stmt->executeQuery();
$users = $resultSet->fetchAllAssociative();

function html_table($data = array())
{
    $rows = array();
    foreach ($data as $row) {
        $cells = array();
        foreach ($row as $cell) {
            $cells[] = "<td>{$cell}</td>";
        }
        $rows[] = "<tr>" . implode('', $cells) . "</tr>";
    }
    echo '<table class="table"><thead><tr><th scope="col">ID</th><th scope="col">NAME</th><th scope="col">EMAIL</th><th scope="col">AUTH TYPE</th><th scope="col">PERMISSION</th><th scope="col">CREATE DATE</th><th scope="col">LAST LOGIN</th></tr></thead>' . implode('', $rows) . "</table>";
}

html_table($users);

require_once 'libs/footer.php';
?>