<!DOCTYPE html>
<html>
<head>


<title> View Borrowed Library Materials Record</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<h1>View Borrowed Library Materials Record</h1>

<?php
session_start();
require "connection.php";
echo "Welcome ".$_SESSION["username"]. "! Welcome to our library system!";
echo"<br>Any user borrow the library material more than 14 days will charge for $0.5 per day as the overdue charge!!!";
echo "<br><br>Borrow books record...<br>";

$sql="SELECT books.booktitle, borrowbook.borrowDate, returnbook.returnDate, 
(returnbook.returnDate- borrowbook.borrowDate) AS totalDays, ((returnbook.returnDate- borrowbook.borrowDate)-14)*0.5 AS payment FROM books, borrowbook, returnbook 
WHERE books.bookid = borrowbook.bookId AND borrowbook.bookId = returnbook.bookId AND borrowbook.userId =(SELECT id FROM users WHERE username='$_SESSION[username]') 
AND returnbook.userId= (SELECT id FROM users WHERE username='$_SESSION[username]')";
//retrieved the borrow book record for the loged-in admin




$result=$con->query($sql);

echo "<table align='center' table border=1>
	<tr>
	<th>Book title </th>
	<th>Borrow Date </th>
	<th>Return Date </th>
	<th>Borrowed Days </th>
	<th>Overdue Payment </th>
	</tr>";

		
	if ($result->num_rows> 0){
		while($row= $result->fetch_assoc()){
			if ($row["payment"] >0){
				echo"<tr>";
				echo "<td>".$row["booktitle"]. "</td>";
				echo "<td>".$row["borrowDate"]. "</td>";
				echo "<td>".$row["returnDate"]. "</td>";
				echo "<td>".$row["totalDays"]. "</td>";
				echo "<td>$".$row["payment"]. "</td>";
				echo "</tr>";
				
			}
			else{
				echo"<tr>";
				echo "<td>".$row["booktitle"]. "</td>";
				echo "<td>".$row["borrowDate"]. "</td>";
				echo "<td>".$row["returnDate"]. "</td>";
				echo "<td>".$row["totalDays"]. "</td>";
				echo "<td>$0</td>";
				echo "</tr>";
				
			}
			
			}
			
		}
echo "</table>";		
		

echo "<br><br>Borrow movies record...<br>";

$sql2="SELECT movies.name, borrowmovie.borrowDate, returnmovie.returnDate, 
(returnmovie.returnDate- borrowmovie.borrowDate) AS totalDays, ((returnmovie.returnDate- borrowmovie.borrowDate)-14)*0.5 AS payment FROM movies, borrowmovie, returnmovie 
WHERE movies.id = borrowmovie.movieId AND borrowmovie.movieId = returnmovie.movieId AND borrowmovie.userId =(SELECT id FROM users WHERE username='$_SESSION[username]') 
AND returnmovie.userId= (SELECT id FROM users WHERE username='$_SESSION[username]')";

//retrieved the borrow movie record for the loged-in admin



$result2=$con->query($sql2);

echo "<table align='center' table border=1>
	<tr>
	<th>Movie title </th>
	<th>Borrow Date </th>
	<th>Return Date </th>
	<th>Borrowed Days </th>
	<th>Overdue Payment </th>
	</tr>";

		
	if ($result2->num_rows> 0){
		while($row= $result2->fetch_assoc()){
			if ($row["payment"] >0){
				echo"<tr>";
				echo "<td>".$row["name"]. "</td>";
				echo "<td>".$row["borrowDate"]. "</td>";
				echo "<td>".$row["returnDate"]. "</td>";
				echo "<td>".$row["totalDays"]. "</td>";
				echo "<td>$".$row["payment"]. "</td>";
				echo "</tr>";
			}
			else{
				echo"<tr>";
				echo "<td>".$row["name"]. "</td>";
				echo "<td>".$row["borrowDate"]. "</td>";
				echo "<td>".$row["returnDate"]. "</td>";
				echo "<td>".$row["totalDays"]. "</td>";
				echo "<td>$0</td>";
				echo "</tr>";
			}
			
			
			}
		}		

		
echo "</table>";

echo "<br><br>Attend Library Events record...<br>";

$sq3="SELECT activities.name, activities.date, activities.fee FROM activities, 
signupactivities  WHERE signupactivities.userId=(SELECT id FROM users WHERE username='$_SESSION[username]')  
AND activities.id= signupactivities.eventId";
//retrieved the join event record for the loged-in admin




$result3=$con->query($sq3);

echo "<table align='center' table border=1>
	<tr>
	<th>Event Name </th>
	<th>Event Date </th>
	<th>Event Fee </th>
	</tr>";

		
	if ($result3->num_rows> 0){
		while($row= $result3->fetch_assoc()){
			
			echo"<tr>";
			echo "<td>".$row["name"]. "</td>";
			echo "<td>".$row["date"]. "</td>";
			echo "<td>$".$row["fee"]. "</td>";
			echo "</tr>";
						
			
			
			
			}
			
		}
echo "</table>";	



?>




<p>
<br><input type="button" class="button" value="Back to Admin Page" onclick="window.location.href='userpage_admin.php'"/></br></p>

</body>
</html>
