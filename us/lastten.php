<?php
$username = 'root';
$password = 'HunterPence';
$database = 'localhost';
$table = 'Tables';
	
$conn = new mysqli($database, $username, $password, $table);

$sql = "SELECT * FROM `urlshortener`";
$result = $conn->query($sql);

$i = 0;
$shorts = array();
$reals = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
    	$i = $i + 1;
        array_push($shorts, $row['short']);
        array_push($reals, urldecode($row['url']));
    }
}
$j = 1;
if($result->num_rows >= 10) {
for ($i=$result->num_rows - 1; $i >= $result->num_rows - 10; $i = $i - 1) { 
	echo "<p>" . $j . ": <a target='_blank'href='http://localhost/us?u=" . $shorts[$i] . "'>http://localhost/us?u=" . $shorts[$i] . "</a> goes to <a target='_blank'href='" . $reals[$i] . "'>" . $reals[$i] . "</a>. </p>";
	$j++;
}
}
else {
	for ($i=$result->num_rows - 1; $i >= 0; $i = $i - 1) { 
	echo "<p>" . $j . ": <a target='_blank'href='http://localhost/us?u=" . $shorts[$i] . "'>http://localhost/us?u=" . $shorts[$i] . "</a> goes to <a target='_blank'href='" . $reals[$i] . "'>" . $reals[$i] . "</a>. </p>";
	$j++;
}
}
if($result->num_rows < 1) echo "<i>No shortens in database.</i>";
//echo "View the full history <a href='history.php'>here</a>.";
die();
?>