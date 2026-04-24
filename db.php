<?php
$host = 'localhost';
$user = 'jmoon24';
$pass = 'jmoon24';
$db   = 'jmoon24';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die('DB Error: ' . $conn->connect_error);
}
?>