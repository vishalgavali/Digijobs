<?php

session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<style>





ul {
    
    background-color:#006699;
}

nav{

border-radius: 5px;
    background-color:#a6a6a6;
    padding: 1px;
}


td, th {
  border: 0px solid #dddddd;
    text-align: left;
    padding: 4px;
}
table{
border-radius:10px;
font-color:black;
margin-left:170px;
background-color:lightgray;
}
.button {
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
	margin-left:50px;
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
	margin-left:1200px;
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
<li><a href="job.php" class="active">JOBS</a></li>
<li><a href="company11.html">COMPANIES</a></li>
<li><a href="contact.html">CONTACT US</a></li>
<li><a href="about.html">ABOUT US</a></li>

</ul>
</nav>
<body>
<br>

<?php	if (isset($_SESSION["user"]))
{	
?>
<a href="logout.php" class="button1">Logout</a>
<?php } ?>

<?php
 $con=mysqli_connect("localhost","root","Root@1234","digijobs");     
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT a.j_id, a.j_profile,a.city,a.vacancy,a.package,a.c_id,b.c_id,b.c_name FROM job a,company b where a.c_id=b.c_id order by a.j_id asc");


while($row = mysqli_fetch_array($result))

 {
	$jid=$row['j_id'];
	$jp=$row['j_profile'];
	$city=$row['city'];
	$vac=$row['vacancy'];
	$pac=$row['package'];
	$cname=$row['c_name'];
?>



	<table border=0 cellspacing=20 width=500>
  	
	<tr><th>Job Profile: <tb>
		<?php echo $jp; ?>	
	</th></tr>
	<tr><th>City: <tb>
		<?php echo $city; ?>	
	</th></tr>
	<tr><th>Vacancies: <tb>
		<?php echo $vac; ?>	
	</th></tr>
	<tr><th>Package: <tb>
		<?php echo $pac; ?>	
	</th></tr>
	<tr><th>Company:<tb>
		<?php echo $cname; ?>	
	</th></tr>
<?php	if (isset($_SESSION["user"]))
{	

?>
	<tr><th>

	<a href="applyforjob.php?jid=<?php echo $jid; ?>" class="button">Apply</a>
	</th></tr>
<?php } ?>
	</table>
	<br>
<?php }


mysqli_close($con);

?>
</table>


<footer> &copy;  Copyright 2019 | All Rights Reserved | Digijobs.com
</footer>
</body>
</html>
