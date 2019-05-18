<!DOCTYPE html>
<html>
<head>


<title> Events</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<h1>The Lastest Events</h1>
<?php
session_start();
require "connection.php";
echo "Welcome ".$_SESSION["username"]. "(admin)! Welcome to our library system!";
echo "<br><br>The library events...<br>";

$sql="SELECT * FROM activities WHERE date >'2017-12-01' ORDER BY date DESC";




$result=$con->query($sql);
echo "<br>The library events in December: ";
//select all the library events in November

echo "<table align='center' table border=1>
	<tr>
	<th>Event ID </th>
	<th>Event Name </th>
	<th>Event Date </th>
	<th>Fee</th>
	</tr>";

		
	if ($result->num_rows> 0){
		while($row= $result->fetch_assoc()){
			
			echo"<tr>";
			echo "<td>".$row["id"]. "</td>";
			echo "<td>".$row["name"]. "</td>";
			echo "<td>".$row["date"]. "</td>";
			echo "<td>$".$row["fee"]. "</td>";
			echo "</tr>";
				
		}
			
			
		
			
	}
	echo "</table>";

//----------------------------------------------------------------------------
$sql2="SELECT * FROM activities WHERE date >'2017-11-01' AND date <'2017-12-01' ORDER BY date DESC";
//select all the library events in November




$result2=$con->query($sql2);
echo "<br>The library events in November: ";

echo "<table align='center' table border=1>
	<tr>
	<th>Event ID </th>
	<th>Event Name </th>
	<th>Event Date </th>
	<th>Fee</th>
	</tr>";

		
	if ($result2->num_rows> 0){
		while($row= $result2->fetch_assoc()){
			
			echo"<tr>";
			echo "<td>".$row["id"]. "</td>";
			echo "<td>".$row["name"]. "</td>";
			echo "<td>".$row["date"]. "</td>";
			echo "<td>$".$row["fee"]. "</td>";
			echo "</tr>";
				
		}
			
			
		
			
	}
	echo "</table>";
		
//--------------------------------------------------------------
$sql3="SELECT * FROM activities WHERE date >'2017-10-01' AND date <'2017-11-01' ORDER BY date DESC";
//select all the library events in October




$result3=$con->query($sql3);
echo "<br>The library events in October: ";

echo "<table align='center' table border=1>
	<tr>
	<th>Event ID </th>
	<th>Event Name </th>
	<th>Event Date </th>
	<th>Fee</th>
	</tr>";

		
	if ($result3->num_rows> 0){
		while($row= $result3->fetch_assoc()){
			
			echo"<tr>";
			echo "<td>".$row["id"]. "</td>";
			echo "<td>".$row["name"]. "</td>";
			echo "<td>".$row["date"]. "</td>";
			echo "<td>$".$row["fee"]. "</td>";
			echo "</tr>";
				
		}
			
			
		
			
	}
	echo "</table>";
//---------------------------------------------------------------------------------
$sql4="SELECT * FROM activities WHERE date >'2017-9-01' AND date <'2017-10-01' ORDER BY date DESC";
//select all the library events in September




$result4=$con->query($sql4);
echo "<br>The library events in September: ";

echo "<table align='center' table border=1>
	<tr>
	<th>Event ID </th>
	<th>Event Name </th>
	<th>Event Date </th>
	<th>Fee</th>
	</tr>";

		
	if ($result4->num_rows> 0){
		while($row= $result4->fetch_assoc()){
			
			echo"<tr>";
			echo "<td>".$row["id"]. "</td>";
			echo "<td>".$row["name"]. "</td>";
			echo "<td>".$row["date"]. "</td>";
			echo "<td>$".$row["fee"]. "</td>";
			echo "</tr>";
				
		}
			
			
		
			
	}
echo "</table>";

echo"<br>--------------------------------------------------------------------";
echo"<br><br>The coming events";
$sql7="SELECT id, name, date FROM activities WHERE id NOT IN (SELECT id from activities WHERE date < CURDATE()) ORDER BY date DESC"; 
//select the events with date larger than the current date

echo "<table align='center' table border=1>
	<tr>
	<th>Event ID </th>
	<th>Event Name </th>
	<th>Event Date </th>
	</tr>";		
		
$result7=$con->query($sql7);
if ($result7->num_rows> 0){
	while($row= $result7->fetch_assoc()){
		echo"<tr>";
		echo "<td>".$row["id"]. "</td>";
		echo "<td>".$row["name"]. "</td>";
		echo "<td>".$row["date"]. "</td>";
		echo "</tr>";
			
	}
}
echo"</table>";
echo"<br>--------------------------------------------------------------------";
echo"<br><br>The past events";
$sql6="SELECT id, name, date FROM activities WHERE id IN (SELECT id from activities WHERE date < CURDATE()) ORDER BY date DESC"; 
//select the events with date smaller than the current date

echo "<table align='center' table border=1>
	<tr>
	<th>Event ID </th>
	<th>Event Name </th>
	<th>Event Date </th>
	</tr>";		
		
$result6=$con->query($sql6);
if ($result6->num_rows> 0){
	while($row= $result6->fetch_assoc()){
		echo"<tr>";
		echo "<td>".$row["id"]. "</td>";
		echo "<td>".$row["name"]. "</td>";
		echo "<td>".$row["date"]. "</td>";
		echo "</tr>";
			
	}
}
echo"</table>";
	
echo"<br>----------------------------------------------------------------";
				
echo "<br>The registered users in the coming library events...<br>";

$sql5="SELECT signupactivities.userId, users.name, signupactivities.parentName, signupactivities.parentPhone FROM signupactivities, activities, users WHERE 
signupactivities.eventId= activities.id AND signupactivities.userId= users.id AND activities.id=1";
//use sql to see the users who has register in a particular event

echo "<br>Book reading: ";

$result5=$con->query($sql5);
echo "<table align='center' table border=1>
	<tr>
	<th>User ID </th>
	<th>Name </th>
	<th>Parent Name </th>
	<th>Parent Phone</th>
	</tr>";

		
	if ($result5->num_rows> 0){
		while($row= $result5->fetch_assoc()){
			
			echo"<tr>";
			echo "<td>".$row["userId"]. "</td>";
			echo "<td>".$row["name"]. "</td>";
			echo "<td>".$row["parentName"]. "</td>";
			echo "<td>".$row["parentPhone"]. "</td>";
			echo "</tr>";
				
		}
			
			
		
			
	}
	echo "</table>";
	
//---------------------------------------------------------------
				
$sql9="SELECT signupactivities.userId, users.name, signupactivities.parentName, signupactivities.parentPhone FROM signupactivities, activities, users WHERE 
signupactivities.eventId= activities.id AND signupactivities.userId= users.id AND activities.id=2";
//use sql to see the users who has register in a particular event

echo "<br>Book Introduction: ";

$result9=$con->query($sql9);
echo "<table align='center' table border=1>
	<tr>
	<th>User ID </th>
	<th>Name </th>
	<th>Parent Name </th>
	<th>Parent Phone</th>
	</tr>";

		
	if ($result9->num_rows> 0){
		while($row= $result9->fetch_assoc()){
			
			echo"<tr>";
			echo "<td>".$row["userId"]. "</td>";
			echo "<td>".$row["name"]. "</td>";
			echo "<td>".$row["parentName"]. "</td>";
			echo "<td>".$row["parentPhone"]. "</td>";
			echo "</tr>";
				
		}
			
			
		
			
	}
	echo "</table>";
	
//----------------------------------------------------------
$sql10="SELECT signupactivities.userId, users.name, signupactivities.parentName, signupactivities.parentPhone FROM signupactivities, activities, users WHERE 
signupactivities.eventId= activities.id AND signupactivities.userId= users.id AND activities.id=3";
//use sql to see the users who has register in a particular event

echo "<br>New Book Exhibition: ";

$result10=$con->query($sql10);
echo "<table align='center' table border=1>
	<tr>
	<th>User ID </th>
	<th>Name </th>
	<th>Parent Name </th>
	<th>Parent Phone</th>
	</tr>";

		
	if ($result10->num_rows> 0){
		while($row= $result10->fetch_assoc()){
			
			echo"<tr>";
			echo "<td>".$row["userId"]. "</td>";
			echo "<td>".$row["name"]. "</td>";
			echo "<td>".$row["parentName"]. "</td>";
			echo "<td>".$row["parentPhone"]. "</td>";
			echo "</tr>";
				
		}
			
			
		
			
	}
	echo "</table>";

	//-----------------------------------------------------------------
$sql11="SELECT signupactivities.userId, users.name, signupactivities.parentName, signupactivities.parentPhone FROM signupactivities, activities, users WHERE 
signupactivities.eventId= activities.id AND signupactivities.userId= users.id AND activities.id=4";
//use sql to see the users who has register in a particular event

echo "<br>New Book Exhibition: ";

$result11=$con->query($sql11);
echo "<table align='center' table border=1>
	<tr>
	<th>User ID </th>
	<th>Name </th>
	<th>Parent Name </th>
	<th>Parent Phone</th>
	</tr>";

		
	if ($result11->num_rows> 0){
		while($row= $result11->fetch_assoc()){
			
			echo"<tr>";
			echo "<td>".$row["userId"]. "</td>";
			echo "<td>".$row["name"]. "</td>";
			echo "<td>".$row["parentName"]. "</td>";
			echo "<td>".$row["parentPhone"]. "</td>";
			echo "</tr>";
				
		}
			
			
		
			
	}
	echo "</table>";
	
//------------------------------------------------------
$sql12="SELECT signupactivities.userId, users.name, signupactivities.parentName, signupactivities.parentPhone FROM signupactivities, activities, users WHERE 
signupactivities.eventId= activities.id AND signupactivities.userId= users.id AND activities.id=6";
//use sql to see the users who has register in a particular event

echo "<br>Play with Books: ";

$result12=$con->query($sql12);
echo "<table align='center' table border=1>
	<tr>
	<th>User ID </th>
	<th>Name </th>
	<th>Parent Name </th>
	<th>Parent Phone</th>
	</tr>";

		
	if ($result12->num_rows> 0){
		while($row= $result12->fetch_assoc()){
			
			echo"<tr>";
			echo "<td>".$row["userId"]. "</td>";
			echo "<td>".$row["name"]. "</td>";
			echo "<td>".$row["parentName"]. "</td>";
			echo "<td>".$row["parentPhone"]. "</td>";
			echo "</tr>";
				
		}
			
			
		
			
	}
	echo "</table>";
		

				
?>
</table>


<p>
<br><input type="button" class="button" value="Create New Event" onclick="window.location.href='createEvent_admin.php'"/></br></p>

<p>
<br><input type="button" class="button" value="Back to Admin Page" onclick="window.location.href='userpage_admin.php'"/></br></p>

</body>
</html>


