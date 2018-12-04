<?php
$username = 'root';
$password = 'im not that dumb';
$database = 'localhost';
$table = 'Tables';
define("username", "root");
define("password", "HunterPence");
define("database", "localhost");
define("table", "Tables");
$conn = new mysqli(database, username, password, table);

function checkLoggedIn() {
	//check if user logged in (cookie)
	//if(logged in) return true;
	return false;
}
$loggedin = checkLoggedIn();
if(!$loggedin) die("<i>You are not signed in. Sign in <a href='account.php'>here</a></i>");
else {
	// $sql = "SELECT * FROM 'urlshorten' WHERE shortenedby = huser";
	//echo(users recent shortens);
}
?>