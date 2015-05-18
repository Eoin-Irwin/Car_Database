<!DOCTYPE html>
	<html lang="en">
<head>
<title>NCT | Website</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="newer.css" type="text/css"/>
	<link href='http://fonts.googleapis.com/css?family=questrial' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="header">
<nav class="row">
<div id ="logo">
<a class="goto">Car Database</a>
</div>
</div>
<hr></hr>
<div id="login">
<form action="index.php" method="post">
	<th>Username:<input type="text" name="username" placeholder="Username"></th>
	<th>Password:<input type="password" name="password" placeholder="Password"></th>
	<input type="submit" value="login">
	</form>
</div>
	</body>
</html>
<?php
	
	if (empty($_POST) === false) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		// error checking
		
		if (empty($username) == true || empty($password) == true) {
			$errors[] = 'You need to enter a username and password';
			header("location: login.php");
		} else
		if (user_exists($username) == false) {
			$errors[] = 'Username does not exist';
			header("location: login.php");
		} else {
			// call login function with submitted data
			$login = login($username, $password);
			
			if ($login == false) {
				$errors[] = 'Username and password combination is incorrect';
				header("location: login.php");
			} else {
				// set the user session and login
				$_SESSION['username'] = $login;
				header('Location: index.php');
				exit();
			}

		}

	} else {
		$errors[] = 'No data recieved';
	}

	// Output
	
	if (empty($errors) == false) {
	}

	?>