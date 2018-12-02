<?php
$servername = 'localhost';
$username = 'root';
$password = 'HunterPence';
$database = 'Harvest';
$id = $_GET['id'];
if($id == "all") {
	$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
$sql = "TRUNCATE Harvest1";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
$conn->close();
}
else {
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
$sql = "DELETE FROM Harvest1 WHERE id='$id'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
$conn->close();
}
?>