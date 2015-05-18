<!DOCTYPE html>
	<html lang="en">
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
<a class="goto" href="#">Car Database</a>
</div>
<!---NavBar-->
<ul id ="nav">
<li><a href="logout.php">Logout</a></li>
<li><a href="delete.php">Delete</a></li>
<li><a href="edit.php">Edit</a></li>
<li><a href="insert.php">Add </a></li>
<li><a href="view.php">View</a></li>
<li><a href="index.php">Home</a></li>
</ul>
</nav>
<!---EndNavBar-->
</div>
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
		<?php
	mysql_connect('localhost', 'root', '');
	
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	mysql_select_db('details');
	$sql = "SELECT * from user_details";
	$result = mysql_query($sql);
	
	if ($result > 0) {
		// output data of each row
		while($user_details=mysql_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>".$user_details['Registration']."</td>";
			echo "<td>".$user_details['Owner_Name']."</td>";
			echo "<td>".$user_details['Make']."</td>";
			echo "<td>".$user_details['Model']."</td>";
			echo "<td>".$user_details['Year']."</td>";
			echo "<td>".$user_details['Number_Of_Fails']."</td>";
			echo "<td>".$user_details['Next_Test_date']."</td>";
			echo "</tr>";
		}

	} else {
		echo "0 results";
	}

	?>
			<h1>Delete details by registration</h1>
		<form method="post">
			Registration:
			<input type="text" name="Registration">
		<br><input type="submit" name="Delete" value="Delete"/>
		</form>
		<?php
	
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	
	if(isset($_POST['Delete'])){
		$con = mysqli_connect("localhost", "root", "");
		
		if(!$con){
			die("Cant connect to database". mysql_error());
		}

		$user = $_POST["Registration"];
		$query = "DELETE from details.user_details WHERE Registration = '$user'";
		mysql_query($query) or die ("0 Records deleted");
	}

	?>
	</body>
</html>