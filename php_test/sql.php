<?php
$servername = 'localhost';
$username = 'pma';
$password = 'HunterPence';
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