<!DOCTYPE html>
<html>
<head>

<title>Advanced Search book</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<h1>Advanced Search Book Page</h1>
<p>Enter keywords to search a book</p>

<!--create a form to collect searching criteria-->

<form method="post" >

<div class="data">
<label>Book ID:</label>
<input name= "bookid" type="text">
</div>

<div class="data">
<label>Book Title:</label>
<input name= "booktitle" type="text">
</div>

<div class="data">
<label>Author:</label>
<input name= "author" type="text">
</div>

<div class="data">
<label>Publisher:</label>
<input name= "publisher" type="text">
</div>

<div class="data">
<label>Category:</label>
<input name= "category" type="text">
</div>

<div class="data">
<input type="submit" name="Search_Book" value="Search Book">

<?php 

if (isset($_POST["Search_Book"])){
	require "connection.php";
	$bookid=$_POST["bookid"];
	$booktitle=$_POST["booktitle"];
	$author=$_POST["author"];
	$publisher=$_POST["publisher"];
	$category=$_POST["category"];

	
		
	$sql="SELECT * FROM books where bookid LIKE '%$_POST[bookid]%' AND booktitle LIKE '%$_POST[booktitle]%' AND author LIKE '%$_POST[author]%'
	AND publisher LIKE '%$_POST[publisher]%' AND category LIKE '%$_POST[category]%' ORDER BY booktitle ASC";
	//use a sql to retrieved the matching book record and sort by book title
	$result=$con->query($sql);
	echo "<table align='center' table border=1>
	<tr>
	<th> Book ID </th>
	<th>Book title </th>
	<th>Author </th>
	<th>Publisher </th>
	<th>Number of pages </th>
	<th>Category </th>
	<th>Avalibility </th>
	<th>Register date </th>
	</tr>";
	
	
	
	if ($result->num_rows> 0){
		
		echo "<p>Found " .$result->num_rows. " records sorted by Book Title...<p>";
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
}

?>
</table>

<p>
<br><input type="button" class="button" value="Advanced Search on Movies" onclick="window.location.href='adSearchMovie.php'"/>

<p>
<br><input type="button" class="button" value="Back to Main" onclick="window.location.href='mainMenu.php'"/></br></p>



</body>
</html>

