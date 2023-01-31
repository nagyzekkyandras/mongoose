<?php
require_once 'vendor/autoload.php';

$database = new Database();

// check DB
try {
    $conn = $database->getConnection();
    $database->checkDb();
} catch (Exception $e) {
    echo '<p id="error">Caught exception: ',  $e->getMessage(), "\n";
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
}
