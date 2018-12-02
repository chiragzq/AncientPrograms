<?php
$servername = 'localhost';
$username = 'root';
$password = 'HunterPence';
$database = 'Tables';
$conn = new mysqli($servername, $username, $password, $database);
$nme1 = $_GET['name'];
$txt1 = $_GET['text'];
$pwd1 = $_GET['pwd'];
$sql = "INSERT INTO txt (NAME, TEXT, PWD)
VALUES ('$nme1', '$txt1', '$pwd1')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>