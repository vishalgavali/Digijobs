<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">

<title>Confirmation</title>
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
<?php

$jp = $_POST["j_profile"];
$city = $_POST["city"];
$vac = $_POST["vac"];
$pac = $_POST["pac"];
$cid = $_POST["c_id"];

?>

<?php

 $con=mysqli_connect("localhost","root","Root@1234","digijobs");     
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$done=mysqli_query($con,"INSERT INTO job (j_profile,city,vacancy,package,c_id) VALUES ('$jp','$city','$vac','$pac','$cid')");

if($done){
?>
    <script>
            alert("Job added successfully.");
            location.href="addjob.html";
           	</script>
<?php	}
else {
?>
    <script>
            alert("Error while adding job. (Check if company id is valid or not.)");
            location.href="addjob.html";
           	</script>
<?php

}



mysqli_close($con);

?>

<footer> &copy;  Copyright 2019 | All Rights Reserved | Digijobs.com
</footer>
</body>
</html>
