<!DOCTYPE html>
<html>
<head>


<title> Welcome to admin profile</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<h1>Welcome to admin profile...</h1>
</div>
<div class="menuBar">
<a href="statistics.php">Statistics</a> &middot;
<a href="event_admin.php">Events</a> &middot;
<a href="allUsers.php">Update Users</a> &middot;
<a href="allBooks.php">Update Materials</a> &middot;
<a href="viewRecord_admin.php">View records</a> 

</div>


<?php
session_start();
require "connection.php";
echo "<br>Welcome ".$_SESSION["username"]. " (admin)! Welcome to our library system!";
echo "<br><br>-----------------------------------------";
echo "<i><p style= 'font-size: 200%;'>~~~~New Messages...~~~~</i>";

$username=$_SESSION['username'];



$sql="SELECT * FROM message WHERE userId= (SELECT id FROM users WHERE username= '$username')";
//retrieved the message of the loged in users in the message table



$result=$con->query($sql);


echo "<p>";
		
	if ($result->num_rows> 0){
		while($row= $result->fetch_assoc()){
			echo "<b><i>" .$row["time"];
			echo "----";
			echo $row["message"]."</i></b>";
			echo "<br><br>";
			
	}
	}

echo"<p><img src='userpageAdminImg.jpg' ></p>";
echo "<p><a href='mainMenu.php?action=logout'>Logout</a>";	
?>




</body>
</html>