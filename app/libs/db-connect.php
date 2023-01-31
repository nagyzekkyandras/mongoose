<?php

# get credentials from env variables
$DB_HOST = getenv('DB_HOST');
$DB_PORT = getenv('DB_PORT');
$DB_NAME = getenv('DB_NAME');
$DB_USERNAME = getenv('DB_USERNAME');
$DB_PASSWORD = getenv('DB_PASSWORD');

$connectionParams = [
    'dbname' => $DB_NAME,
    'user' => $DB_USERNAME,
    'password' => $DB_PASSWORD,
    'host' => $DB_HOST,
    'port' => $DB_PORT,
    'driver' => 'pdo_mysql',
];

$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);
