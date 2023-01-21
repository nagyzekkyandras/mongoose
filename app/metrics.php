<?php
require_once 'vendor/autoload.php';
require_once 'libs/db-connect.php';

// check DB
try {
    $statement = $conn->executeQuery('SELECT count(id) FROM users');
    $user = $statement->fetch();
} catch (Exception $e) {
    echo '<p id="error">Caught exception: ',  $e->getMessage(), "\n";
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
} 

?>