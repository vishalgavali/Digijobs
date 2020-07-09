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
width:60%;
border-radius:5px;
margin-left:auto;
margin-right:auto;
background-color:lightgray;
font-size:18px;
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
	margin-left:800px;
	margin-top:30px;
}	

	tr:nth-child(even) {background-color: #f2f2f2;}


	
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

<h2> Users  </h2>
<br>

<?php
 $con=mysqli_connect("localhost","root","Root@1234","digijobs");     
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT * FROM user_view");

echo"<table border='1'><tr><th>User Id</th><th>First Name</th><th>Last Name</th><th>E-mail</th><th>Mobile</th><th>Date of Birth</th><th>City</th><th>Delete</th></tr>";


while($row=mysqli_fetch_assoc($result))
            {
			            $uid=$row['u_id'];
                        $fname=$row['f_name'];
                        $lname=$row['l_name'];
                        $email=$row['e_mail'];
			$mob=$row['mobile'];
                        $dob=$row['dob'];
                        $city=$row['city'];
?>
  	
	<tr><td>
	<?php echo $uid; ?>	
	</td>

	<td>
	 <?php echo $fname;	?>
	</td>

	<td>
	<?php echo $lname;	?>
	</td>

	<td>
	<?php echo $email;	?>
	</td>

	<td>
	<?php echo $mob;	?>
	</td>

	<td>
	<?php echo $dob;	?>
	</td>

	<td>
	<?php echo $city;	?>
	</td>

	<td>
	 <a href="deleteuser.php?uid= <?php echo $uid; ?>"> Delete </a> &#10060;
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

