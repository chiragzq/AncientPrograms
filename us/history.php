
<?php
$username = 'root';
$password = 'im not that dumb';
$database = 'localhost';
$table = 'Tables';
	
$conn = new mysqli($database, $username, $password, $table);

$sql = "SELECT * FROM `urlshortener`";
$result = $conn->query($sql);

$i = 0;
$shorts = array();
$reals = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){// ||$i < 11) {
		//echo $row['short'] . " " . $row['real'];
    	$i = $i + 1;
        array_push($shorts, $row['short']);
        array_push($reals, urldecode($row['url']));
    }
}
$j = 1;
echo "Go to the <a href='#bottom'>bottom</a>";
for ($i=$result->num_rows - 1; $i > -1 ; $i = $i - 1) {
	$j++;
}
echo "Once the database reaches over 65000 shortens, it will be manually cleared. Make sure you re-shorten your urls! :)";
if($result->num_rows < 1) echo "<i>No shortens in database.</i>";
die("<p style='color: white;' name='bottom'>bottom</p>");
?>