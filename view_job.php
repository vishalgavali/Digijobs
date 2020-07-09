<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<style>

td, th {
    border: 1px solid grey;
    text-align: left;
    padding: 4px;
	height:30px;
}

table{
border-collapse: collapse;
width:70%;
border-radius:5px;
margin-left:auto;
margin-right:auto;
background-color:lightgray;
font-size:18px;
}

	tr:nth-child(even) {background-color: #f2f2f2;}
	
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
	margin-left:800px;
	margin-top:30px;
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

<h2> Jobs  </h2>
<br>

<?php
 $con=mysqli_connect("localhost","root","Root@1234","digijobs");     
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT a.j_id, a.j_profile,a.city,a.vacancy,a.package,a.c_id,b.c_id,b.c_name FROM job a,company b where a.c_id=b.c_id order by a.j_id asc");

echo"<table border='1'><tr><th>Job Id</th><th>Job Profile</th><th>City</th><th>Vacancy</th><th>Package</th><th>Company Id</th> <th>Company</th><th>Delete</th></tr>";


 while($row=mysqli_fetch_assoc($result))
            {
			            $jid=$row['j_id'];
                        $jprop=$row['j_profile'];
                        $city=$row['city'];
                        $vac=$row['vacancy'];
			$pac=$row['package'];
                        $cid=$row['c_id'];
                        $cname=$row['c_name'];
?>
  	
	<tr><td>
	<?php echo $jid; ?>	
	</td>

	<td>
	 <?php echo $jprop;	?>
	</td>

	<td>
	<?php echo $city;	?>
	</td>

	<td>
	<?php echo $vac;	?>
	</td>

	<td>
	<?php echo $pac;	?>
	</td>

	<td>
	<?php echo $cid;	?>
	</td>

	<td>
	<?php echo $cname;	?>
	</td>

	<td>
	 <a href="deletejob.php?jid= <?php echo $jid; ?>"> Delete </a> &#10060;
	</td>

	</tr>
<?php } ?>
</table>
<?php mysqli_close($con); ?>

<a href="admin.php" class="button">Back</a>
<footer> &copy;  Copyright 2019 | All Rights Reserved | Digijobs.com
</footer>
</body>
</html>

