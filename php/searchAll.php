<!DOCTYPE html>
<html>
<head>


<title>Search books and movies</title>
<link rel="stylesheet" href="style.css">
</header>

<body>
<h1>Search Book and Movies Page</h1>
<p>Enter any relevant keywords to search books or movies</p>

<!--create a form to collect user input-->
<form method="post">

<div class="data">

<input name= "all" type="text">
</div>


<div class="data">
<input type="submit" name="Search" value="Search">

<?php 

if (isset($_POST["Search"])){
	require "connection.php";
	$all=$_POST["all"];
	
		
	$sql="SELECT * FROM books where bookid LIKE '%$_POST[all]%' OR booktitle LIKE '%$_POST[all]%' OR author LIKE '%$_POST[all]%'
	OR publisher LIKE '%$_POST[all]%' OR category LIKE '%$_POST[all]%' ORDER BY booktitle ASC";
	//use a sql to retrieved the matching book record and sort by book title
	
	$result=$con->query($sql);
	echo "<table align='center' table border=1>
	<tr>
	<th> Book ID </th>
	<th>Book Title </th>
	<th>Author </th>
	<th>Publisher </th>
	<th>Number of pages </th>
	<th>Category </th>
	<th>Avalibility </th>
	<th>Register date </th>
	</tr>";

   
	
	
	if ($result->num_rows> 0){
		echo "<br><br>Books<br>";
		echo "------------------------------------";
		echo "<br>Found " .$result->num_rows. " records sorted by Book Title...";
		while($row= $result->fetch_assoc()){
			echo"<tr>";
			echo "<td>".$row["bookid"]. "</td>";
			echo "<td>".$row["booktitle"]. "</td>";
			echo "<td>".$row["author"]. "</td>";
			echo "<td>".$row["publisher"]. "</td>";
			echo "<td>".$row["pages"]. "</td>";
			echo "<td>".$row["category"]. "</td>";
			echo "<td>".$row["avalibility"]. "</td>";
			echo "<td>".$row["reg_date"]. "</td>";
			
			echo "</tr>";
			
		}
	}
	else{
		echo "<br>No such record";
	}


echo "<br> </br>";

$sql2="SELECT * FROM movies where id LIKE '%$_POST[all]%' OR name LIKE '%$_POST[all]%' OR director LIKE '%$_POST[all]%'
	OR main_actor LIKE '%$_POST[all]%' OR main_actress LIKE '%$_POST[all]%'
	OR year_publish LIKE '%$_POST[all]%' OR duration LIKE '%$_POST[all]%' OR category LIKE '%$_POST[all]%'	ORDER BY name ASC";
	//use a sql to retrieved the matching movie record and sort by movie title
	
	$result2=$con->query($sql2);
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

   
	
	
	if ($result2->num_rows> 0){
		echo "<br><br>Movies<br>";
		echo "------------------------------------";
		echo "<br>Found " .$result2->num_rows. " records sorted by Movie Title...<p>";
		while($row= $result2->fetch_assoc()){
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

<input type="button" class="button" value="Advanced Search on Movies" onclick="window.location.href='adSearchMovie.php'"/></br></p>
<p>
<br><input type="button" class="button" value="Back to Main" onclick="window.location.href='mainMenu.php'"/></br></p>



</body>
</html>

