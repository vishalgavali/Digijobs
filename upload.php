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

$fn = $_POST["fname"];
$ln = $_POST["lname"];
$eml = $_POST["email"];
$mob = $_POST["mobile"];
$dob = $_POST["dob"];
$city = $_POST["city"];

$pass = $_POST["passc"];
?>

<?php

 $con=mysqli_connect("localhost","root","Root@1234","digijobs");     
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$done=mysqli_query($con,"INSERT INTO user (f_name,l_name,e_mail,mobile,dob,city,password) VALUES ('$fn','$ln','$eml','$mob','$dob','$city','$pass')");
if($done){
?>
    <script>
            alert("You have successfully registered with us!");
            location.href="home.html";
           	</script>
<?php	}

mysqli_close($con);

?>


<footer> &copy;  Copyright 2019 | All Rights Reserved | Digijobs.com
</footer>
</body>
</html>
