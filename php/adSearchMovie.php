<!DOCTYPE html>
<html>
<head>

<title>Advanced Search movie</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<h1>Advanced Search Movie Page</h1>
<p>Enter keywords to search a movie</p>
<!--create a form to collect searching criteria-->
<form method="post">

<div class="data">
<label>Movie ID:</label>
<input name= "movieid" type="text">
</div>

<div class="data">
<label>Movie Title:</label>
<input name= "movietitle" type="text">
</div>

<div class="data">
<label>Director:</label>
<input name= "director" type="text">
</div>

<div class="data">
<label>Main Actor:</label>
<input name= "main_actor" type="text">
</div>

<div class="data">
<label>Main Actress:</label>
<input name= "main_actress" type="text">
</div>

<div class="data">
<label>Year of Publish:</label>
<input name= "year_publish" type="text">
</div>

<div class="data">
<label>Category:</label>
<input name= "category" type="text">
</div>


<div class="data">
<label>Duration:</label>
<input name= "duration" type="text">
</div>

<div class="data">
<input type="submit" name="Search_Movie" value="Search Movie">

<?php 

if (isset($_POST["Search_Movie"])){
	require "connection.php";
	$movieid=$_POST["movieid"];
	$movietitle=$_POST["movietitle"];
	$director=$_POST["director"];
	$main_actor=$_POST["main_actor"];
	$main_actress=$_POST["main_actress"];
	$year_publish=$_POST["year_publish"];
	$category=$_POST["category"];
	$duration=$_POST["duration"];

	$sql="SELECT * FROM movies where id LIKE '%$_POST[movieid]%' AND name LIKE '%$_POST[movietitle]%' AND director LIKE '%$_POST[director]%'
	AND main_actor LIKE '%$_POST[main_actor]%' AND main_actress LIKE '%$_POST[main_actress]%'
	AND year_publish LIKE '%$_POST[year_publish]%' AND duration LIKE '%$_POST[duration]%' AND category LIKE '%$_POST[category]%' ORDER BY name ASC";
	//use a sql to retrieved the matching book record and sort by book title
		
	
	$result=$con->query($sql);
	echo "<table align='center' table border=1>
	<tr>
	<th> Movie ID </th>
	<th>Movie title </th>
	<th>Director </th>
	<th>Main actor </th>
	<th>Main Actress </th>
	<th>Year of Publish </th>
	<th>Duration </th>
	<th>Category </th>
	<th>Avaliability </th>
	<th>Register date </th>
	</tr>";

   
	
	
	if ($result->num_rows> 0){
		
		echo "<br><br>Found " .$result->num_rows. " records sorted by Movie Title...";
		while($row= $result->fetch_assoc()){
			echo"<tr>";
			echo "<td>".$row["id"]. "</td>";
			echo "<td>".$row["name"]. "</td>";
			echo "<td>".$row["director"]. "</td>";
			echo "<td>".$row["main_actor"]. "</td>";
			echo "<td>".$row["main_actress"]. "</td>";
			echo "<td>".$row["year_publish"]. "</td>";
			echo "<td>".$row["duration"]. "</td>";
			echo "<td>".$row["category"]. "</td>";
			echo "<td>".$row["avalibility"]. "</td>";
			echo "<td>".$row["reg_date"]. "</td>";
			
			echo "</tr>";
			
		}
	}
	else{
		echo "<br>No such record";
	}
}

?>
</table>
<p>
<br><input type="button" class="button" value="Advanced Search on Books" onclick="window.location.href='adSearchBook.php'"/>


<p>
<br><input type="button" class="button" value="Back to Main" onclick="window.location.href='mainMenu.php'"/></br></p>



</body>
</html>

