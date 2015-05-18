<!DOCTYPE html>
   <html lang="en">
<head>
<title>NCT | Website</title>
   <meta charset="utf-8" />
   <link rel="stylesheet" href="newer.css" type="text/css"/>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'></head>
<body>
<h1>Welcome to the CAR database</h1>
  <hr></hr><?php
   //Start your session
   session_start();
   //Read your session (if it is set)
   
   if (isset($_SESSION['username']))   {
      echo $USERNAME;
   }

   ?>
<div class="header">
<nav class="row">
<div id ="logo">
<a class="goto" href="#">NCT Database</a>
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
<!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                    <img class="img-responsive" src="MeNew.png" alt="">
                    <div class="intro-text">
                        <span class="name">Eoin Irwin</span>
                        <hr class="star-light">
                        <span class="skills">Web Developer | Programmer | Back End Designer</span>
                </div>
            </div>
        </div>
    </header>
</body>
</html>