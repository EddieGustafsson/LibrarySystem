<?php
include 'settings.php';

$dbServername = $db_host;
$dbUsername = $db_user;
$dbPassword = $db_password;
$dbName = $db_name;

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
mysqli_set_charset($conn,"utf8mb4");