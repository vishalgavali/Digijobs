<?php

session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<style>



	
input[type=text], select, textarea {
 	 width: 50%;
	padding: 12px;
 	 border: 1px solid #ccc;
 	 border-radius: 4px;
  	resize: vertical;
}

label {
  	padding: 12px 12px 12px 0;
  	display: inline-block;
}

input[type=submit] {
	
  	background-color: #006699;
  	color: white;
  	padding: 12px 20px;
  	border: none;
  	border-radius: 4px;
  	cursor: pointer;
  	margin-left: 25%;
	width:20%;
}

	

.container {
	margin-left: auto;
  	margin-right: auto;
	width: 60%;
 	 border-radius: 5px;
 	 background-color: #f2f2f2;
 	 padding: 20px;
	font-size: 22px;
}

.col-25 {
 	 float: left;
 	 width: 20%;
 	 margin-top: 6px;
}

.col-75 {
 	 float: left;
 	 width: 75%;
 	 margin-top: 6px;
}

.row::after {
  content: "";
  clear: both;
  display: table;
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
 	float: right;
	margin-right:20px;
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

<h2>Admin Login </h2>
<br>

<div class="container">
  <form action="" method="post">
    <div class="row">
      <div class="col-25">
        <label for="user"> Username : </label>
      </div>
      <div class="col-75">
        <input type="text" id="user" name="user" placeholder="Enter Username">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="pass">Password :</label>
      </div>
      <div class="col-75">
        <input type="password" id="pass" name="pass" placeholder="Enter Password">
      </div>
    </div>
    
    <div class="row">
	<div class="col-75">
		      
      <input type="submit" name="login" value="Login">
		</div>      
    </div>
  </form>
</div>

<?php 
     
      if(isset($_POST['login']))
      {
      	$user=$_POST['user'];
      	$password=$_POST['pass'];
      	$conn=mysqli_connect('localhost','root','Root@1234','digijobs');
         $select="SELECT * FROM admin WHERE u_name='$user' AND password='$password'";
         $result=mysqli_query($conn,$select);
         if(mysqli_num_rows($result)>0)
         {
         	$_SESSION["admin"]=$user;
         	header('location:admin.php');
         }
         else
         {
               echo "Invalid Username or Password!";  
         }
      }

?>

<footer> &copy;  Copyright 2019 | All Rights Reserved | Digijobs.com
</footer>
</body>
</html>
