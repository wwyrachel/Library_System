<!DOCTYPE html>
<html>
<head>


<title>Welcome to our library</title>
<link rel="stylesheet" href="style.css">

</head>
<body>

<img src="backgroundImg1.jpg" width="700px" height="300px">


<header>Welcome to ABC library system....</header>

<div class="menuBar">
<a href="about.php">About</a> &middot;
<a href="login.php">Login</a> &middot;
<a href="mainEvent.php">Events</a> &middot;
<a href="searchAll.php">Search</a> &middot;
<a href="contact.php">Contact</a> 
</div>
<p></p>

<p style="margin-left: 230px; margin-right: 230px;  font-size: 130% "><i>
Here, you can become one of our members and get our latest news. 
By becoming our members, you can search your records and update personal information whenever you want!!!!</p>


<?php 

require "connection.php";

$sql="UPDATE statistics SET count= count+1 WHERE name= 'visitorCount'";
$result=$con->query($sql);
// count increase by 1 if a visitor visit our library page, it use to record the visitor count
		
?>

</body>
</html>