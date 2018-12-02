<?php
$servername = "localhost";
$username = "root";
$password = "HunterPence";
$dbname = "Harvest";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$Crop = $_GET["crop"];
$Day = $_GET["date"];
$Pounds = $_GET["pounds"];
$Id = $_GET["id"];
$sql = "INSERT INTO Harvest1 (CROP, DAY, POUNDS, ID) 
VALUES ('$Crop', '$Day', '$Pounds', '$Id')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>