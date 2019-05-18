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
echo "<br>Your personal information...<br>";

$sql="SELECT * FROM users where username='$_SESSION[username]'";
//select all from the users table of the loged in user
$result=$con->query($sql);
		
		if ($result->num_rows> 0){
			while($row= $result->fetch_assoc()){
			echo "<br>Username: ".$row["username"]. "<br>Password: " .$row["password"]. "<br>Name: ".$row["name"]. "<br>Age: " .$row["age"]. "<br>Phone: " .$row["phone"]. "<br>Email: ".$row["email"].
			"<br>Address: ".$row["address"]."<br>Parent Phone Number: ".$row["parent_phone"]."</br>";
			
			}
		}		


?>
<p>
<br><input type="button" class="button" value="Edit" onclick="window.location.href='update.php'"/></br></p>

<p>
<br><input type="button" class="button" value="Back User Page" onclick="window.location.href='userpage_user.php'"/></br></p>

</body>
</html>
