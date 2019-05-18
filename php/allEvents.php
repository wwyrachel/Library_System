<!DOCTYPE html>
<html>
<head>

<Style>

h1{
	font-size: 35px;
	color: #444444;
	margin: 20px
}

body {
	font-family: Century Gothic, Arial;
	margin: 0 auto;
	text-align: center;
	
}

input[type=submit]{
	
	background-color: white;
	
	margin: 8px 0;
	border: 2px solid black; 
	transition-duration: 0.4s;
	cursor: pointer;
}

input[type=submit]:hover{
	background-color: #444444;
	color: white;
	
}

.button{
	background-color: white;
	border: 2px solid black; 
	padding: 7px 12px;
	cursor: pointer;
	transition-duration: 0.4s;
	
}

.button:hover{
	background-color:#444444;
	color: white;
	
	
}

table{
	border-collapse: collapse;
}



table, td, th{
	border: 1px solid black;
	text-align: center;
}
</Style>


</head>
<title>Edit library Events</title>
<body>
<h1>Edit library Events</h1>
<p>Admin is allowed to edit library events' information</p>

<?php 
session_start();
require "connection.php";
$sql="SELECT * FROM activities";
$result=$con->query($sql);

	echo "<table align='center' table border=1>
	<tr>
	<th>Event Name </th>
	<th>Date</th>
	<th>Fee </th>
	</tr>";

		
	if ($result->num_rows> 0){
		while($row= $result->fetch_assoc()){
			echo"<tr>  <form method=post >";
			
			echo "<td><input type= text name=name value='".$row['name']."'></td>";
			echo "<td><input type= text name=date value='".$row['date']."'></td>";
			echo "<td><input type= text name=fee value='".$row['fee']."'></td>";
			echo"<td><input type= hidden name=id value='".$row['id']."'></td>";
			echo"<td><input type='submit' name='submit' value='submit'>";
			
			echo "</form></tr>";
		}
	}
	

if (isset($_POST["submit"])){
	$id= $_POST["id"];
	$name=$_POST["name"];
	$date= $_POST["date"];
	$fee= $_POST["fee"];
	
	
	

	if (empty($name) || empty($date)|| empty($fee)){
		echo "Event Name, Date and Fee are required!!";
		}
	
	else{
		$sql2="UPDATE activities SET name='$_POST[name]', date='$_POST[date]', fee='$_POST[fee]' WHERE id='$_POST[id]'";
		//update the records in activities table in the database
			
		if($result2=$con->query($sql2)){
			echo"Successfully updated<br>";
			echo '<meta http-equiv="refresh" content="1" />';
			//reload this page after 1s to see the difference
			}
			else{
				echo"Error!";
				}
	
		}


	
	
}	
?></table>

<p>
<input type="button" class="button" value="Update Books Records" onclick="window.location.href='allBooks.php'"/>

<input type="button" class="button" value="Update Movies Records" onclick="window.location.href='allMovies.php'"/>

</br></p>


<p>
<br><input type="button" class="button" value="Back to Admin Page" onclick="window.location.href='userpage_admin.php'"/></br></p>



</body>
</html>

