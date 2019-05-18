<!DOCTYPE html>
<html>
<head>


<title> Forget Password</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<h1>Forget Password...</h1>

<?php 
echo "Fill in the form below to reset your password<br>";

if (isset($_POST["Reset"])){
	require "connection.php";
	$username=$_POST["username"];
	$pass=$_POST["pass"];
	$pass1=$_POST["pass1"];
	$name= $_POST["name"];
	$age=$_POST["age"];
	$phone=$_POST["phone"];
	

	
	
	if ((!empty($pass) || empty($pass1)) AND $pass != $pass1){
		echo "Password and Confirmed Password are not the same!!<br>";
	}
	else{
		if (empty($username) || empty($pass)|| empty($name)){
		echo "Username, Password and Name are required!!";
		}
		
	else{
		$sql="SELECT * FROM users where username='$_POST[username]' AND age='$_POST[age]' AND name='$_POST[name]'";
		$result=$con->query($sql);
		while($row= $result->fetch_assoc()){
			if ($result->num_rows> 0){
				$sql2="UPDATE users SET	password='$_POST[pass]' WHERE username='$_POST[username]'";
				//reset the user password using update
				if($con->query($sq2)==TRUE){
					echo"Password successfully reset!";
					}
				else{
					echo"Username, Age or Name Incorrected!";
				}
			
		}
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

</div>
<div class="data">
<label>Password:</label>
<input name= "pass" type="text">
</div>

</div>
<div class="data">
<label>Confirmed Password:</label>
<input name= "pass1" type="text">
</div>


<div class="data">
<input type="submit" name="Reset" value="Reset Password">

<p>
<br><input type="button" class="button" value="Back to Main" onclick="window.location.href='mainMenu.php'"/></br></p>


</body>
</html>
