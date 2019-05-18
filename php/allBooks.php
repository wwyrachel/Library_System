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
<title>Edit library Books</title>
</head>

<body>
<h1>Edit library Books</h1>
<p>Admin is allowed to edit library materials' information</p>

<?php 
session_start();
require "connection.php";
$sql="SELECT * FROM books";
$result=$con->query($sql);

	echo "<table align='center' table border=1>
	<tr>
	<th>Book Title </th>
	<th>Author</th>
	<th>Publisher </th>
	<th>Pages </th>
	<th>Avalibility </th>
	<th>Category </th>
	</tr>";

		
	if ($result->num_rows> 0){
		while($row= $result->fetch_assoc()){
			echo"<tr>  <form method=post >";
			
			echo "<td><input type= text name=booktitle value='".$row['booktitle']."'></td>";
			echo "<td><input type= text name=author value='".$row['author']."'></td>";
			echo "<td><input type= text name=publisher value='".$row['publisher']."'></td>";
			echo "<td><input type= text name=pages value='".$row['pages']."'></td>";
			echo "<td><input type= text name=avalibility value='".$row['avalibility']."'></td>";
			echo "<td><input type= text name=category value='".$row['category']."'></td>";
			echo"<td><input type= hidden name=bookid value='".$row['bookid']."'></td>";
			echo"<td><input type='submit' name='submit' value='submit'>";
			
			echo "</form></tr>";
		}
	}
	

if (isset($_POST["submit"])){
	$bookid= $_POST["bookid"];
	$booktitle=$_POST["booktitle"];
	$author= $_POST["author"];
	$age=$_POST["publisher"];
	$pages=$_POST["pages"];
	$avalibility=$_POST["avalibility"];
	$category=$_POST["category"];
	
	
	

	if (empty($booktitle) || empty($author)|| empty($pages)){
		echo "Book Title, Author and Pages are required!!";
		}
	
	else{
		$sql2="UPDATE books SET booktitle='$_POST[booktitle]', author='$_POST[author]', pages='$_POST[pages]', avalibility='$_POST[avalibility]', 
		category='$_POST[category]'  WHERE bookid='$_POST[bookid]'";
		//update the records in books table in the database
			
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


<input type="button" class="button" value="Update Movies Records" onclick="window.location.href='allMovies.php'"/>

<input type="button" class="button" value="Update Events Records" onclick="window.location.href='allEvents.php'"/></br></p>


<p>
<br><input type="button" class="button" value="Back to Admin Page" onclick="window.location.href='userpage_admin.php'"/></br></p>



</body>
</html>

