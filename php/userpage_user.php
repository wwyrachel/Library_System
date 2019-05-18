<!DOCTYPE html>
<html>
<head>


<title> Welcome to user profile</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<h1>Welcome to user profile...</h1>
</div>
<div class="menuBar">
<a href="event.php">Events</a> &middot;
<a href="showUserInfo.php">Update Information</a> &middot;
<a href="viewRecord.php">View records</a> &middot;

</div>


<?php
session_start();
require "connection.php";
echo "<br>Welcome ".$_SESSION["username"]. " (user)! Welcome to our library system!";
echo "<br><br>-----------------------------------------";
echo "<p style= 'font-size: 200%;'>~~~~New Messages...~~~~";
$username=$_SESSION['username'];



$sql="SELECT * FROM message WHERE userId= (SELECT id FROM users WHERE username= '$username')";
//retrieved the message of the loged in users in the message table




$result=$con->query($sql);


echo "<p>";
		
	if ($result->num_rows> 0){
		while($row= $result->fetch_assoc()){
			echo "<b>" .$row["time"];
			echo "----";
			echo $row["message"]."</b>";
			echo "<br><br>";
			
	}
	}


echo"<p><img src='userpageUserImg.jpg' ></p>";
echo "<br><a href='mainMenu.php?action=logout'>Logout</a>";
?>



</body>
</html>