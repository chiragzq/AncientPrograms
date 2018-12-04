<?php 
function checkLoggedIn($user, $pass) {
	if(isset($_COOKIE['loggedin'])) return false;
	$username = 'root';
	$password = 'im not that dumb';
	$database = 'localhost';
	$table = 'Tables';
	$conn = new mysqli($database, $username, $password, $table);
}

require_once('recaptchalib.php');
$publickey = '6LdfUgkTAAAAAP9Zd9McFRYKGDFo3yXidCjPlbnQ'; // you got this from the signup page
if(!isset($_POST['action'])) {
	echo("<!DOCTYPE html><html><heead><title>Login</title></head><script src='https://www.google.com/recaptcha/api.js'></script>
		<style>
		.newaccount {border: 0px white; background-color:transparent;}
		</style><body>
		<form action='account.php' method='POST'>
		Login<br>
		<fieldset>
			<legend>Information</legend>
			Username:<input name='username' type='text' value='Username' /><br>
			Password:<input name='password' type='password' />
		</fieldset>
		<input type='hidden' name='action' value='login'>
		<input name='submit' type='submit' value='Log In' /><br>");
		echo recaptcha_get_html($publickey);
		die("</form><br>
		<form action='account.php' method='POST'>
		<input type='hidden' name='action' value='newaccount'>
		<input class='newaccount' type='submit' value='Don&#39;t have an account? Create one here.' name='submit' />
		</form>
		<!--<div class='g-recaptcha' data-sitekey='6LdfUgkTAAAAAP9Zd9McFRYKGDFo3yXidCjPlbnQ'></div>-->
		</body></html>");
}
if($_POST['action'] == "login") {
	$privatekey = '6LdfUgkTAAAAAEhwFf_ZPahvFJtWOs6jLGBtW5Hf';
	$resp = recaptcha_check_answer ($privatekey,
                                 $_SERVER["REMOTE_ADDR"],
                                 $_POST["recaptcha_challenge_field"],
                                 $_POST["recaptcha_response_field"]);
	$error = false;
	if($resp->is_valid == false) $error = "Captcha invalid. Please retry.";
	echo("<!DOCTYPE html><html><head><title>Login</title></head><script src='https://www.google.com/recaptcha/api.js'></script>
		<style>
		.newaccount {border: 0px white; background-color:transparent;}
		</style><body>");
	if($error != false) echo("<font color='red'>Error: " . $error . "</font><br>");
	echo("<form action='account.php' method='POST'>
		Login<br>
		<fieldset>
			<legend>Information</legend>
			Username:<input name='username' type='text' value='Username' /><br>
			Password:<input name='password' type='password' />
		</fieldset>
		<input type='hidden' name='action' value='signin'>
		<input name='submit' type='submit' value='Log In' />
		</form><br>
		<form action='account.php' method='POST'>
		<input type='hidden' name='action' value='newaccount'>
		<input class='newaccount' type='submit' value='Don&#39;t have an account? Create one here.' name='submit' />");
    	 echo recaptcha_get_html($publickey);
		die("</form>
		<!--<div class='g-recaptcha' data-sitekey='6LdfUgkTAAAAAP9Zd9McFRYKGDFo3yXidCjPlbnQ'></div>-->
		</body></html>");
}
if($_POST['action'] == "newaccount") {
	echo("<!DOCTYPE html><html><head><title>Login</title></head><script src='https://www.google.com/recaptcha/api.js'></script>
		<style>
		.newaccount {border: 0px white; background-color:transparent;}
		</style><body>
		<form action='account.php' method='POST'>
		Create an account<br>
		<fieldset>
		<legend>Information</legend>
		Username:<input name='username' type='text' value='Username' /><br>
		Password:<input name='password' type='password' />
		</fieldset>
		<input type='hidden' name='action' value='createaccount' />
		<input type='submit' name='submit' value='Create account' />");
		echo recaptcha_get_html($publickey);
		die("</form><br>
		<form action='account.php' method='POST'>
		<input type='submit' class='newaccount' name='submit' value='Have an account? Sign in here.' />
		</form>
		</body></html>");
}
?>