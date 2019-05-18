<!DOCTYPE html>
<html>
<head>


<title> Update user's information</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<h1>Update user's information</h1>

<?php
session_start();
require "connection.php";
echo "Welcome ".$_SESSION["username"]. "! Welcome to our library system!";
echo "<br>Enter your lastest information here...";

$sql="SELECT * FROM users where username='$_SESSION[username]'";
$result=$con->query($sql);
		
		if ($result->num_rows> 0){
			while($row= $result->fetch_assoc()){
			
			
			echo"<form method= post>";
			echo"<br>Name: <input type='text' name='name' value=''><br>";
			echo"Age: <input type='text' name='age' value=''><br>";
			echo"Phone: <input type='text' name='phone' value=''><br>";
			echo"Email: <input type='text' name='email' value=''><br>";
			echo"Address: <input type='text' name='address' value=''><br>";
			echo"Parent Phone: <input type='text' name='parent_phone' value=''><br>";
			echo"Password: <input type='password' name='pass' value=''><br>";
			echo"Confirm Password: <input type='password' name='pass1' value=''><br>";
			echo"<br><input type='submit' name='submit' value='submit'><br>";
			}
		}



if (isset($_POST["submit"])){
	
	$name= $_POST["name"];
	$age=$_POST["age"];
	$phone=$_POST["phone"];
	$email=$_POST["email"];
	$address=$_POST["address"];
	$parent_phone=$_POST["parent_phone"];
	$pass=$_POST["pass"];
	$pass1=$_POST["pass1"];
	
	if ((!empty($pass) || empty($pass1)) AND $pass != $pass1){
		echo "Password and Confirmed Password are not the same!!<br>";
	}

	if (empty($name) || empty($age)|| empty($phone)){
		echo "Name, Age and Phone are required!!";
		}
	
		else{
			$sql2="UPDATE users SET name='$_POST[name]', age='$_POST[age]', phone='$_POST[phone]', email='$_POST[email]', address='$_POST[address]'			
			, password='$_POST[pass]', parent_phone='$_POST[parent_phone]' WHERE username='$_SESSION[username]'";
			//update the user information
			
			if($result2=$con->query($sql2)){
				echo"successfully updated<br>";
				}
				else{
					echo"error!";
					}
			}

	
		
		
}



?>
<p>

<br><input type="button" class="button" value="Back to User Page" onclick="window.location.href='userpage_user.php'"/></br></p>

</body>
</html>
