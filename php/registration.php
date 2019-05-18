<!DOCTYPE html>
<html>
<head>


<title> Register for new user</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<h1>Register for new user</h1>

<?php 
if (isset($_POST["Register"])){
	require "connection.php";
	$username=$_POST["username"];
	$pass=$_POST["pass"];
	$pass1=$_POST["pass1"];
	$name= $_POST["name"];
	$age=$_POST["age"];
	$phone=$_POST["phone"];
	$email=$_POST["email"];
	$address=$_POST["address"];
	$parentPhone= $_POST["parentPhone"];

	if ((!empty($pass) || empty($pass1)) AND $pass != $pass1){
		echo "Password and Confirmed Password are not the same!!<br>";
	}
	else{
		if (empty($username) || empty($pass)|| empty($name)){
		echo "Username, Password and Name are required!!";
		}
		
	else{
		$sql="INSERT INTO users(username, password, name, age, phone, email, address, type, parent_phone) 
		VALUES('$username','$pass', '$name', '$age', '$phone', '$email', '$address', 'user','$parentPhone')";
		//insert the user information into users table in the database
		if($con->query($sql)==TRUE){
			echo"Successfully registered!";
			}
			else{
				echo"Error!";
			}
		}
	}
	
	
}
?>

<!--create a form to collect user input-->
<form id="form1" name="form1" method="post" >
<form>
<div class="data">
<label>Username:</label>
<input name= "username" type="text">
</div>

<div class="data">
<label>Name:</label>
<input name= "name" type="text">
</div>

<div class="data">
<label>Age:</label>
<input name= "age" type="text">
</div>

<div class="data">
<label>Phone:</label>
<input name= "phone" type="text">
</div>

<div class="data">
<label>Email:</label>
<input name= "email" type="text">
</div>

<div class="data">
<label>Address:</label>
<input name= "address" type="text">
</div>

<div class="data">
<label>Parent Phone:</label>
<input name= "parentPhone" type="text">
</div>

<div class="data">
<label>Password:</label>
<input name= "pass" type="password">
</div>

<div class="data">
<label>Confirm Password:</label>
<input name= "pass1" type="password">
</div>

<div class="data">
<input type="submit" name="Register" value="Register">

<p>
<br><input type="button" class="button" value="Back to Main" onclick="window.location.href='mainMenu.php'"/></br></p>


</body>
</html>
