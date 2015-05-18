<!DOCTYPE html>
	<html lang="en">
<head>
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
<?php
	mysql_connect('localhost', 'root', '');
	
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	mysql_select_db('details');
	mysql_connect('localhost', 'root', '');
	
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	mysql_select_db('details');
	$sql = "SELECT * from user_details";
	$result = mysql_query($sql);
	
	if (isset($_POST['submit']))
	if(isset($_POST['radio1'])){
		echo "<center><table border=1>
		<tr>
		<th>Registration</th>
		    <th>Owner_Name</th>
		    <th>Make</th>
		    <th>Model</th>
		    <th>Year</th>
		    <th>Number_Of_Fails</th>
		    <th>Next_Test_Date</th>
		</tr></center>";
		
		if ($result>0) {
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

	}

	$sql1 = "SELECT * from test_result";
	$result1 = mysql_query($sql1);
	
	if(isset($_POST['radio2'])){
		echo "<center><table border=1>
		<tr>
		<th>Registration</th>
		    <th>Test_Date</th>
		    <th>Test_Result</th>
		    <th>Mechanic_Name</th>
		</tr></center>";
		
		if ($result1>0) {
			// output data of each row
			while($test_result=mysql_fetch_assoc($result1)) {
				echo "<tr>";
				echo "<td>".$test_result['Registration']."</td>";
				echo "<td>".$test_result['Test_Date']."</td>";
				echo "<td>".$test_result['Test_Result']."</td>";
				echo "<td>".$test_result['Mechanic_Name']."</td>";
				echo "</tr>";
			}

		} else {
			echo "0 results";
		}

	}

	$sql2 = "SELECT * from sub_test";
	$result2 = mysql_query($sql2);
	
	if(isset($_POST['radio3'])){
		echo "<center><table border=1>
		<tr>
			<th>Registration</th>
			<th>Test_Type</th>
		    <th>Criticality</th>
		    <th>Result</th>
		</tr></center>";
		
		if ($result2>0) {
			// output data of each row
			while($sub_test=mysql_fetch_assoc($result2)) {
				echo "<tr>";
				echo "<td>".$sub_test['Registration']."</td>";
				echo "<td>".$sub_test['Test_Type']."</td>";
				echo "<td>".$sub_test['Criticality']."</td>";
				echo "<td>".$sub_test['Result']."</td>";
				echo "</tr>";
			}

		} else {
			echo "0 results";
		}

	}
	$sql3 = "SELECT * from mechanic";
	$result3 = mysql_query($sql3);
	
	if(isset($_POST['radio4'])){
		echo "<center><table border=1>
		<tr>
			<th>Mechanic Name</th>
			<th>Speciality</th>
		    <th>Availability times</th>
		</tr></center>";
		
		if ($result3>0) {
			// output data of each row
			while($sub_test=mysql_fetch_assoc($result3)) {
				echo "<tr>";
				echo "<td>".$sub_test['Mechanic_name']."</td>";
				echo "<td>".$sub_test['Speciality']."</td>";
				echo "<td>".$sub_test['Availability_times']."</td>";
				echo "</tr>";
			}

		} else {
			echo "0 results";
		}

	}
	?>
	?>
<div class="container">
<div class="main">
<form action="view.php" method="post">
<!--- Select Option Fields Starts Here -->
<!-- Radio Button Starts Here -->
<center><br><br><label class="heading">Tables:</label>
<input name="radio1" type="radio" value="Owners">Owners |
<input name="radio2" type="radio" value="Test Results">Test Results |
<input name="radio3" type="radio" value="SubTest">Sub Test |
<input name="radio4" type="radio" value="SubTest">Mechanics
<?php  include'radio_value.php'; ?>
<br><br><input name="submit" type="submit" value="View Table"></center>
</form>
</div>
</div>
	</body>
</html>