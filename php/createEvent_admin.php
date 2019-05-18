<!DOCTYPE html>
<html>
<head>


<title> Create New Events</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<h1>Create New Events</h1>

<?php 
session_start();
echo"Fill in the form to create a new event<br>";
if (isset($_POST["Create"])){
	require "connection.php";
	$name=$_POST["name"];
	$date=$_POST["date"];
	$fee=$_POST["fee"];
	

	
	if (empty($name) || empty($date)|| empty($fee)){
		echo "Event Name, Date and Fee are required!!";
		}
		
	else{
		$sql="INSERT INTO `activities` ( `name`, `date`, `fee`) VALUES ('$name', '$date', '$fee')";
		//insert the new record into the activities table in the database
		
		if($con->query($sql)==TRUE){
			echo"Successfully created!";
			}
			else{
				echo"Error!";
			}
		}
	
	
	
}
?>

<!--create a form to let user input information-->
<form id="form1" name="form1" method="post" >
<form>
<div class="data">
<label>Name:</label>
<input name= "name" type="text">
</div>

<div class="data">
<label>Date:</label>
<input name= "date" type="date">
</div>

<div class="data">
<label>Fee:</label>
<input name= "fee" type="text">
</div>



<div class="data">
<input type="submit" name="Create" value="Create">

<p>
<br><input type="button" class="button" value="Back to Events Page" onclick="window.location.href='event_admin.php'"/></br></p>

<p>
<br><input type="button" class="button" value="Back to Admin Page" onclick="window.location.href='userpage_admin.php'"/></br></p>


</body>
</html>
