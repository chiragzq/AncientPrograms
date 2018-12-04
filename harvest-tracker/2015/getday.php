<?php
$servername = 'localhost';
$username = 'root';
$password = 'im not that dumb';
$database = 'Harvest';
//connection
$conn = new mysqli($servername, $username, $password, $database);
//check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
$sql = "SELECT DAY FROM Harvest1";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["DAY"] . " ";
    }
}
$conn->close();
?>