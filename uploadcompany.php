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

$cname = $_POST["c_name"];
$city = $_POST["city"];


?>

<?php

 $con=mysqli_connect("localhost","root","Root@1234","digijobs");     
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$done=mysqli_query($con,"INSERT INTO company (c_name,city) VALUES ('$cname','$city')");

if($done){
?>
    <script>
            alert("Company Added! : <?php echo $cname; ?> ");
            location.href="addcompany.html";
           	</script>
<?php	}

mysqli_close($con);

?>


<footer> &copy;  Copyright 2019 | All Rights Reserved | Digijobs.com
</footer>
</body>
</html>
