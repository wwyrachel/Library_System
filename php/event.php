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
echo "Welcome ".$_SESSION["username"]. "! Welcome to our library system!";
echo "<br><br>The library events...<br>";

$sql="SELECT * FROM activities WHERE date >'2017-12-01' ORDER BY date DESC";
//select all the library events in December



$result=$con->query($sql);
echo "<br>The library events in December: ";

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
//----------------------------------------------------------------------
	
	
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
//---------------------------------------------------------------------

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
		
			
				
?>
</table>

<p>
<br><input type="button" class="button" value="Sign up for a coming event" onclick="window.location.href='eventSignUpForm.php'"/></br></p>



<p>
<br><input type="button" class="button" value="Back to User Page" onclick="window.location.href='userpage_user.php'"/></br></p>

</body>
</html>


