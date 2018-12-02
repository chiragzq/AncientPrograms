<?php
$username = 'root';
$password = 'HunterPence';
$database = 'localhost';
$table = 'Tables';

$conn = new mysqli($database, $username, $password, $table);

$short = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz123456789012345678901234567890asdfghjklqwertyuiopxcvbnm"), 0, 7) ; 

$url = $_GET['url'];
$url = urlencode($url);
//Test to make sure shortened url is not already in database.
$sql = "SELECT short FROM urlshortener";
$shorturls = array();
$l = 0;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        array_push($shorturls, $row['short']);
        $l = $l + 1;
    }
}
if(array_search($short, $shorturls) != "") $short = substr(str_shuffle("br0123456789abcdefghijklmnopqrstuvwxyz123456789012345678901234567890asdfghjklqwertyuiopxcvbnm"), 0,10);

$sql = "INSERT INTO urlshortener (short, url)
VALUES ('$short', '$url')";

if ($conn->query($sql) === TRUE) {
    echo $short;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
$conn->close();
?>