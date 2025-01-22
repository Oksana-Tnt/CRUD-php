<?php

try {

    $hostName = 'localhost';
    $dbName = 'crud-4-24';
    $dbUser = 'Oksana';
    $dbPassword = '8Ph26qZ5';

    $db = new PDO("mysql:host=$hostName;dbname=$dbName", $dbUser, $dbPassword);
} catch (Exception $e) {

    echo "Error: " . $e->getMessage();
    exit;
}
