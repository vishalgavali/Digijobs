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
width:50%;
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

<h2> Companies  </h2>
<br>

<?php
 $con=mysqli_connect("localhost","root","Root@1234","digijobs");     
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT * FROM company");

echo"<table border='1'><tr><th>Company Id</th><th>Company Name</th><th>City</th><th>Delete</th></tr>";


while($row=mysqli_fetch_assoc($result))
            {
			            $cid=$row['c_id'];
                        $cname=$row['c_name'];
                        $city=$row['city'];
?>
  	
	<tr><td>
	<?php echo $cid; ?>	
	</td>

	<td>
	 <?php echo $cname;	?>
	</td>

	<td>
	<?php echo $city;	?>
	</td>

	<td>
	 <a href="deletecompany.php?cid= <?php echo $cid; ?>"> Delete </a>  &#10060;
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

