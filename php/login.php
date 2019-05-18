<!DOCTYPE html>
<html>
<head>


<title>Login page</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<h1>Login for the library System</h1>
<?php 
session_start();
if (isset($_POST["Login"])){
	require "connection.php";
	$username=$_POST["username"];
	$pass=$_POST["pass"];
	
	
	if (empty($username) || empty($pass)){
		echo "Username and Password are required!!";
		}
		
	if(!empty($_POST["username"]) && !empty($_POST["pass"])  ){
		$sql="SELECT * FROM users where username='$_POST[username]' AND password='$_POST[pass]'";
		$result=$con->query($sql);
		while($row= $result->fetch_assoc()){
			$type=$row["type"] ;
			
		if ($result->num_rows> 0){
			$_SESSION["username"] = $username;
			$_SESSION["type"]= $type;
			
			if ($_SESSION["type"]=="admin"){
				header("Location: userpage_admin.php");
				//if user is admin redirect to admin page
			}
			if ($_SESSION["type"]=="user"){
				header("Location: userpage_user.php");
				//if user is user redirect to user page
			}
			
			
		}
		else{
			echo "Incorrect Username or Password...";
		}
		//if ($result->num_rows<0){
			//echo"no";
			//echo "Incorrect Username or Password...";
			
			//}
		}
		//echo "Incorrect Username or Password...";
		
	}	
	
}

if (isset($_GET["logout"])){
	session_unregister("username");
}
?>


<!--create a form to collect user input-->
<form id="form1" name="form1" method="post">
<form>
<div class="data">
<label>Username:</label>
<input name= "username" type="text">
</div>

<div class="data">
<label>Password:</label>
<input name= "pass" type="password">
</div>


<div class="data">
<input type="reset" name="Reset" value="Reset">
<input type="submit" name="Login" value="Login">

<p>
<br><input type="button" class="button" value="Forget Password??" onclick="window.location.href='forgetPassword.php'"/></br></p>


<p><br>For new user, please sign up first</br>
<br><input type="button" class="button" value="Sign up (Register)" onclick="window.location.href='registration.php'"/></br></p>

<p>
<br><input type="button" class= "button" value="Back to Main" onclick="window.location.href='mainMenu.php'"/></br></p>

</body>
</html>
