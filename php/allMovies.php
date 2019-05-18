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
<title>Edit library Movies</title>
<body>
<h1>Edit library Movies</h1>
<p>Admin is allowed to edit library movies' information</p>

<?php 
session_start();
require "connection.php";
$sql="SELECT * FROM movies";
$result=$con->query($sql);

	echo "<table align='center' table border=1>
	<tr>
	<th>Movie Title </th>
	<th>director</th>
	<th>Main Actor </th>
	<th>Main Actress </th>
	<th>Publish Year </th>
	<th>Duration </th>
	<th>Avalibility </th>
	<th>Category </th>
	</tr>";

		
	if ($result->num_rows> 0){
		while($row= $result->fetch_assoc()){
			echo"<tr>  <form id='theForm' form method=post >";
			
			echo "<td><input type= text name=name value='".$row['name']."'></td>";
			echo "<td><input type= text name=director value='".$row['director']."'></td>";
			echo "<td><input type= text name=main_actor value='".$row['main_actor']."'></td>";
			echo "<td><input type= text name=main_actress value='".$row['main_actress']."'></td>";
			echo "<td><input type= text name=year_publish value='".$row['year_publish']."'></td>";
			echo "<td><input type= text name=duration value='".$row['duration']."'></td>";
			echo "<td><input type= text name=avalibility value='".$row['avalibility']."'></td>";
			echo "<td><input type= text name=category value='".$row['category']."'></td>";
			echo"<td><input type= hidden name=id value='".$row['id']."'></td>";
			echo"<td><input type='submit' name='submit' value='submit'>";
			
			echo "</form></tr>";
		}
	}
	

if (isset($_POST["submit"])){
	$id= $_POST["id"];
	$name=$_POST["name"];
	$director= $_POST["director"];
	$main_actor=$_POST["main_actor"];
	$main_actress=$_POST["main_actress"];
	$year_publish=$_POST["year_publish"];
	$duration=$_POST["duration"];
	$avalibility=$_POST["avalibility"];
	$category=$_POST["category"];
	
	
	

	if (empty($name) || empty($director)|| empty($main_actress)){
		echo "Movie Title, director and Main_actress are required!!";
		}
	
	else{
		$sql2="UPDATE movies SET name='$_POST[name]', director='$_POST[director]',
		main_actress='$_POST[main_actress]',year_publish='$_POST[year_publish]', duration
		='$_POST[duration]', main_actor='$_POST[main_actor]', avalibility='$_POST[avalibility]', 
		category='$_POST[category]'  WHERE id='$_POST[id]'";
		//update the records in movies table in the database
			
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



<input type="button" class="button" value="Update Events Records" onclick="window.location.href='allEvents.php'"/></br></p>


<p>
<br><input type="button" class="button" value="Back to Admin Page" onclick="window.location.href='userpage_admin.php'"/></br></p>





</body>
</html>

