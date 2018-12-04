<?php
$servername = 'localhost';
$username = 'pma';
$password = 'im not that dumb';
$database = 'test';
//connection
$conn = new mysqli($servername, $username, $password, $database);
//check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
echo "OK";
$conn->close();
?>