<!DOCTYPE html>
<html>
<head>


<title> Sign Up for Library Events</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<h1>Sign Up for Library Events</h1>

<?php 
echo"<b>Please enter your parent name, parent phone number and the Event ID of the event you interested to join
<br>(**Children with age less then 15 must join our event with their parent)</b><br>";

session_start();
if (isset($_POST["Register"])){
	require "connection.php";
	$username=$_SESSION['username'];
	$eventid= $_POST["eventid"];
	$parent_name=$_POST["parent_name"];
	$parent_phone=$_POST["parent_phone"];
	$a=array();
	

	
	
	if (empty($eventid) || empty($parent_name)|| empty($parent_phone)){
		echo "Event ID, Name of Parent and Parent Phone Number are required!!";
		}
		
	else{
		$sql2="SELECT id FROM activities WHERE id IN (SELECT id from activities WHERE date < CURDATE())"; 
		
		
		$result2=$con->query($sql2);
		if ($result2->num_rows> 0){
		while($row= $result2->fetch_assoc()){
			array_push($a, $row['id']);
			//use an array to story the eventid which that event's date is larger than the current date
		}
		}
		
		if(in_array($eventid, $a)){
			echo "Event has finished! Please Sign up for another event!";
			}
			else{
				$sql="INSERT INTO signupactivities( userId, eventId, parentName, parentPhone) 
				VALUES((SELECT id FROM users WHERE username= '$username'),'$eventid', '$parent_name', '$parent_phone')";
				//insert the user filled information into the database
				if($con->query($sql)==TRUE){
					echo"Successfully registered!<br>The library staff will contact you about the event details in one to 2 working days";
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
<label>Event ID:</label>
<input name= "eventid" type="text">
</div>

<div class="data">
<label>Name of Parent :</label>
<input name= "parent_name" type="text">
</div>

<div class="data">
<label>Parent Phone Number:</label>
<input name= "parent_phone" type="text">
</div>



<div class="data">
<input type="submit" name="Register" value="Register">

<p>
<br><input type="button" class="button" value="Back to Events Page" onclick="window.location.href='event.php'"/></br></p>

<p>
<br><input type="button" class="button" value="Back to User Page" onclick="window.location.href='userpage_user.php'"/></br></p>


</body>
</html>
