<html>
<head>
<link rel="shortcut icon" href="dit.png" >
<title>NCT | Website</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="newer.css" type="text/css"/>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'></head>
</head>
<body>
<div class="header">
<nav class="row">
<div id ="logo">
<a class="goto" href="index.php">Car Database</a>
</div>
<!---NavBar-->
<ul id ="nav">
<li><a href="logout.php">Logout</a></li>
<li><a href="delete.php">Delete</a></li>
<li><a href="edit.php">Edit</a></li>
<li><a href="insert.php">Add</a></li>
<li><a href="view.php">View</a></li>
<li><a href="index.php">Home</a></li>
</ul>
</nav>
<!---EndNavBar-->
</div>
<body>
<h1>Insert user details</h1>
<hr></hr>
<center><table width="800" border="1" cellpadding="1" cellspacing="1">
<tr>
    <th>Registration</th>
    <th>Owner_Name</th>
    <th>Make</th>
    <th>Model</th>
    <th>Year</th>
    <th>Number_Of_Fails</th>
    <th>Next_Test_Date</th>
</tr></center>
<form action="insert.php" method="post">
<tr><th><input type="text" name="Registration"></th>
<th><input type="text" name="Owner_Name"></th>
<th><input type="text" name="Make"></th>
<th><input type="text" name="Model"></th>
<th><input type="text" name="Year"></th>
<th><input type="text" name="Number_Of_Fails"></th>
<th><input type="text" name="Next_Test_date"></th>
<th><input type="submit" name="submit"/></th>
</form>
<?php
	
	if (isset($_POST['submit'])){
		$con=mysql_connect("localhost","root","");
		
		if(!$con){
			die("Can not connect: ". mysql_error());
		}

		mysql_select_db("details",$con) or die( mysql_error() );
		$sql = "INSERT INTO user_details (Registration, Owner_Name, Make, Model, Year, Number_Of_Fails, Next_Test_date) VALUES ('$_POST[Registration]','$_POST[Owner_Name]','$_POST[Make]','$_POST[Model]','$_POST[Year]','$_POST[Number_Of_Fails]','$_POST[Next_Test_date]')";
		mysql_query($sql);
		
		if(!mysql_query($sql,$con)){
			die('Error:' . mysql_error($con));
		} else {
			echo "1 record added";
		}

		mysql_close($con);
	}

	?>
</body>
</html>