<!doctype html>
<html>
<head>
<title>Register</title>
	<link rel="stylesheet" href="newer.css" type="text/css"/>
	<link href='http://fonts.googleapis.com/css?family=questrial' rel='stylesheet' type='text/css'>
</head>
<body>
<p><a href="register.php">Register</a> | <a href="login.php">Login</a></p>
<h3>Registration Form</h3>
<form action="" method="POST">
Username: <th><input type="text" name="username"></th>
Password: <th><input type="password" name="password"></th>
<input type="submit" value="Register" name="submit">
</form>
<?php
	
	if($_POST['submit']) {
		$username=$_POST['username'];
		$password=$_POST['password'];
		$password = substr(md5(time()),0,30);
		//Encrpyts the password field using the current time to do a one-way cryptographic encoding into a text string of 30 characters
	}

	$con=mysql_connect('localhost', 'root', '') or die(mysql_error());
	mysql_select_db('details') or die ("Cannot select Database");
	//If someone tries to Enter John then JOHN then JoHn. Only one will be used and it won't make duplicate usernames
	$query=mysql_query("SELECT * FROM user WHERE username='".$username."'");
	$numrows=mysql_num_rows($query);
	
	if($numrows!=0){
		echo"Username exists";
	} else {
		mysql_query("INSERT INTO user(username,password) values('$username', '$password')");
		header("location:login.php");
	}

	?>
</body>
</html>