<?php
	$username = 'root';
	$password = 'im not that dumb';
	$database = 'localhost';
	$table = 'Tables';

	$conn = new mysqli($database, $username, $password, $table);
	//try {
if(isset($_GET['u'])) { 
	$short = $_GET['u'];
	//} catch (Exception $e) {
	//	echo("No URL specified. Shorten a new one <a href='shorten.php'>here</a>");
	//}
	$sql = "SELECT url FROM urlshortener WHERE short='$short'";
	$result = $conn->query($sql);
	$did = false;
	if ($result->num_rows > 0) {
  		while($row = $result->fetch_assoc()) {
			$url= $row['url'];
			$url = urldecode($url);
      		$did = true;
    	}
   	}
} else die("No URL specified. Shorten a new one <a href='shorten.php'>here</a>");

if($did) {
	header("location: ". $url);
}
else {
	die("Invalid url. Shorten a new one <a href='shorten.php'>here</a>.");
}
die("You are going to be redirected automatically. If you are not, click <a href='" . $url . "'>here</a> to go to the page.")
?>