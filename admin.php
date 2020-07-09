<?php

session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<style>
body {
 background-image: url("adbackground.png");
 background-color: #cccccc;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: 0px 83px; 

}



.button {
	background-color: #006699;
	color: white;
	border: none;
 	border-radius: 4px;
	width: 150px;
	padding: 12px 20px;
  	text-align: center;
  	text-decoration: none;
 	display: inline-block;
 	font-size: 16px;
	margin-left:120px;

}	
.button1 {
	background-color: #006699;
	color: white;
	border: none;
 	border-radius: 4px;
	width: 75px;
	padding: 12px 20px;
  	text-align: center;
  	text-decoration: none;
 	display: inline-block;
 	font-size: 16px;
	margin-left:1350px;
}
.button2 {
	background-color: #006699;
	color: white;
	border: none;
 	border-radius: 4px;
	width: 150px;
	padding: 12px 20px;
  	text-align: center;
  	text-decoration: none;
 	display: inline-block;
 	font-size: 16px;
	margin-left:80px;

	}
.a { 	
	margin-left: auto;
  	margin-right: auto;
	width: 40%;
 	 border-radius: 5px;
 	 background-color: lightgrey;
 	 padding: 20px;
	font-size: 22px; 
}
	
</style>
</head>

<header>
<h1>
DigiJobs

</h1>
</header>




<nav>
<ul>
<li><a href="home.html">HOME</a></li>
<li><a href="job.php">JOBS</a></li>
<li><a href="company11.html">COMPANIES</a></li>
<li><a href="contact.html">CONTACT US</a></li>
<li><a href="about.html">ABOUT US</a></li>

</ul>
</nav>
<body>

<h2>Welcome Admin  </h2>
<br>

<section>
<?php	if (isset($_SESSION["admin"]))
{	
?>
<a href="logout.php" class="button1">Logout</a>  <br>
<div class="a">
<a href="viewuser.php" class="button">View Users</a>
<a href="viewapplied.php" class="button2">View Applied Users</a>
</div>
         <br> 
<div class="a">
<a href="view_job.php" class="button">View Jobs</a>

<a href="addjob.html" class="button2">Add Jobs</a>   </div>
<br> 
<div class="a">
<a href="viewcompany.php" class="button">View Companies</a>
<a href="addcompany.html" class="button2">Add Company</a>
</div>

<?php } ?>
</section>
<footer> &copy;  Copyright 2019 | All Rights Reserved | Digijobs.com
</footer>
</body>
</html>
