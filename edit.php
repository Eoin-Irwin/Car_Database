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
<h1>Edit user details</h1>
<hr></hr>
</body>
<?php
    $con = mysql_connect("localhost","root","");
    
    if (!$con){
        die("Can not connect: " . mysql_error());
    }

    mysql_select_db("details",$con);
    
    if(isset($_POST['update'])){
        $UpdateQuery = "UPDATE user_details SET Registration='$_POST[Registration]', Owner_Name='$_POST[Owner_Name]', Make='$_POST[Make]', Model='$_POST[Model]', Year='$_POST[Year]', Number_Of_Fails='$_POST[Number_Of_Fails]', Next_Test_date='$_POST[Next_Test_date]' WHERE Registration='$_POST[hidden]'";
        mysql_query($UpdateQuery, $con);
    }

    ;
    $sql = "SELECT * FROM user_details";
    $result = mysql_query($sql,$con);
    echo "<table border=1>
<tr>
<th>Registration</th>
<th>Owner Name</th>
<th>Make</th>
<th>Model</th>
<th>Year</th>
<th>Number Of Fails</th>
<th>Next Test date</th>
</tr>";
    while($user_details = mysql_fetch_array($result)){
        echo "<form action=edit.php method=post>";
        echo "<tr>";
        echo "<td>" . "<input type=text name=Registration value=" . $user_details['Registration'] . " </td>";
        echo "<td>" . "<input type=text name=Owner_Name value=" . $user_details['Owner_Name'] . " </td>";
        echo "<td>" . "<input type=text name=Make value=" . $user_details['Make'] . " </td>";
        echo "<td>" . "<input type=text name=Model value=" . $user_details['Model'] . " </td>";
        echo "<td>" . "<input type=text name=Year value=" . $user_details['Year'] . " </td>";
        echo "<td>" . "<input type=text name=Number_Of_Fails value=" . $user_details['Number_Of_Fails'] . " </td>";
        echo "<td>" . "<input type=text name=Next_Test_date value=" . $user_details['Next_Test_date'] . " </td>";
        echo "<td>" . "<input type=hidden name=hidden value=" . $user_details['Registration'] . " </td>";
        echo "<td>" . "<input type=submit name=update value=update" . " </td>";
        echo "</tr>";
        echo "</form>";
    }

    mysql_close($con);
    ?>
</html>