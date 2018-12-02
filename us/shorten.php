<!DOCTYPE html>
<html>
<body>
URL:<input id="url"> 
<button id="shorten" onclick="save()">Shorten</button>
<p id="shortened"></p>n
<p id="connected"></p> 
<?php
function is_connected()
{
    $connected = @fsockopen("scratch.mit.edu", 443); 
                                        //website, port  (try 80 or 443)
    if ($connected){
        echo "You are connected to the internet.";
        fclose($connected);
    }else{
        echo "Not connected to the internet. Some URLS may not load. Please check your connection.";
    }

}
is_connected();
?>
<script>
var x = new XMLHttpRequest();
var security = "enabled";
function save() {
	console.log("done");
	var url = document.getElementById("url").value;
    var valid = true;
	if(security == "enabled") {
	valid = false;
	if(url.substring(0,7) == "http://") valid = true;
	else if (url.substring(0,8) == "https://") {valid = true; alert("WARNING: https:// URLS may not be secure. Please test your URL or change it to an http:// url.");}
	else {alert("Please include http:// in front of your url. Thank you."); return;}
	}
	if(url.indexOf("google.com/search") > -1) {
		valid = false;
		alert("Sorry, but a google search url was detected. These URLS can break the database of urls and are not cool. :(");
	}
	if(valid) {
		x.open('GET', 'save.php?url=' + url, false);
		x.send();
		document.getElementById("shortened").innerHTML = "Your shoretened url is: localhost/us/?u=" + x.responseText;
	}
}
function disableSecurity() {
	if(confirm("You are about to disable url shortening security. Continue?")){
	 	document.getElementById("shorten").onclick= shorten;
	 	alert("To re-enable security reload the page."); 
	 	console.log("Security disabled.");
	 	return "Security disabled."; 
	}
	else return;
}
setInterval(function() {
	var xhr = new XMLHttpRequest();
	xhr.open('GET', 'lastten.php', true);
	xhr.onreadystatechange = function() {
		document.getElementById("lastten").innerHTML = xhr.responseText;
	}
	xhr.send();
}, 2000);
</script> 
<p><b><u>Recent Shortens</u></b></p>
<p id="lastten">Loading...</p>
<p>View the full history <a href='history.php'>here</a>.</p><br>
<p><b><u>Your Recent Shortens</u></b></p>
<p id="yourshortens">Loading...</p>
<script>
var ajax = new XMLHttpRequest();
ajax.open('GET', 'usershortens.php', false);
ajax.send();;
document.getElementById("yourshortens").innerHTML = ajax.responseText;
</script>
</body>
</html>