<?php

$connectionParams = [
    'dbname' => 'mongoose',
    'user' => 'root',
    'password' => 'example',
    'host' => '192.168.3.56',
    'port' => '3306',
    'driver' => 'pdo_mysql',
];

$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);