<!DOCTYPE html>
<html>
<head>


<title>Statistics</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<h1>Statistics for the library System</h1>

<?php 

require "connection.php";

$sql="UPDATE statistics SET count= count+1 WHERE 1";
$result=$con->query($sql);
$sql2="SELECT * FROM statistics WHERE name= 'visitorCount' ";
	
$result2=$con->query($sql2);
	
while($row= $result2->fetch_assoc()){
			
	echo "The number of visitors: " .$row['count'];
}
//----------------------------------------------------
	
$sql3="SELECT COUNT(*) AS 'count' FROM users";
$result3=$con->query($sql3);
while($row= $result3->fetch_assoc()){
			
	echo "<br>The number of registered user: " .$row['count'];
}	

//---------------------------------------------------------

$sql4="SELECT COUNT(*) AS 'count' FROM books";
$result4=$con->query($sql4);
while($row= $result4->fetch_assoc()){
			
	echo "<br>The number of books in the library: " .$row['count']."<br>";
}

//---------------------------------------------------------

$sql14="SELECT COUNT(*) AS 'count' FROM movies";
$result14=$con->query($sql14);
while($row= $result14->fetch_assoc()){
			
	echo "The number of movies in the library: " .$row['count']."<br>";
}
//---------------------------------------------------------------

$sql13="SELECT COUNT(*) AS 'count' FROM activities";
$result13=$con->query($sql13);
while($row= $result13->fetch_assoc()){
			
	echo "The number of events held in the library: " .$row['count']."<br>";
}

//---------------------------------------------------------------


echo "<br> The active users: <br>(users which have borrowed books, movies or join events in the recent 3 months)";
$sql7= "SELECT id, name FROM users WHERE id  IN (SELECT userId FROM borrowbook WHERE borrowDate >'2017-09-06') 
|| id  IN (SELECT userId FROM borrowmovie WHERE borrowDate >'2017-09-06') 
|| id  IN(SELECT userId FROM signupactivities WHERE eventId IN (SELECT id FROM activities WHERE date >'2017-09-06'))";

$result7=$con->query($sql7);


echo "<table align='center' table border=1>
	<tr>
	<th>User ID </th>
	<th>Name </th>
	</tr>";
	
if ($result7->num_rows> 0){
while($row= $result7->fetch_assoc()){
			
	echo "<td>".$row["id"]. "</td>";
	echo "<td>".$row["name"]. "</td>";
	echo "</tr>";
			
}
}
echo "</table>";
//----------------------------------------------------------

echo "<br> The non-active users: <br>(users which have not borrow  any book, movie and join any events in the recent 3 months)";
$sql8= "SELECT id, name FROM users WHERE id  NOT IN (SELECT userId FROM borrowbook WHERE borrowDate >'2017-09-06') 
AND id NOT IN (SELECT userId FROM borrowmovie WHERE borrowDate >'2017-09-06') 
AND id NOT IN(SELECT userId FROM signupactivities WHERE eventId IN (SELECT id FROM activities WHERE date >'2017-09-06'))";

//$sql8= " SELECT id, name FROM users WHERE  id NOT IN(SELECT userId FROM signupactivities WHERE eventId IN (SELECT id FROM activities WHERE date >'2017-09-06'))" ;

$result8=$con->query($sql8);

echo "<table align='center' table border=1>
	<tr>
	<th>User ID </th>
	<th>Name </th>
	</tr>";
	
if ($result8->num_rows> 0){
while($row= $result8->fetch_assoc()){
	
	//echo "<td>".$row["userId"]. "</td>";
	echo "<td>".$row["id"]. "</td>";
	echo "<td>".$row["name"]. "</td>";
	echo "</tr>";
			
}
}
echo "</table>";

//-----------------------------------------

echo "<br> The books avaliable in the library: <br>";
$sql9= "SELECT bookid, booktitle FROM books WHERE  avalibility= 'YES'";

$result9=$con->query($sql9);

echo "<table align='center' table border=1>
	<tr>
	<th>Book ID </th>
	<th>Book Title </th>
	</tr>";
	
if ($result9->num_rows> 0){
while($row= $result9->fetch_assoc()){
			
	echo "<td>".$row["bookid"]. "</td>";
	echo "<td>".$row["booktitle"]. "</td>";
	echo "</tr>";
			
}
}
echo "</table>";


//-------------------------------------------

echo "<br> The books not avaliable in the library: <br>";
$sql10= "SELECT bookid, booktitle FROM books WHERE  avalibility= 'NO'";

$result10=$con->query($sql10);

echo "<table align='center' table border=1>
	<tr>
	<th>Book ID </th>
	<th>Book Title </th>
	</tr>";
	
if ($result10->num_rows> 0){
while($row= $result10->fetch_assoc()){
			
	echo "<td>".$row["bookid"]. "</td>";
	echo "<td>".$row["booktitle"]. "</td>";
	echo "</tr>";
			
}
}
echo "</table>";


//-------------------------------------------

echo "<br> The movies avaliable in the library: <br>";
$sql11= "SELECT id, name FROM movies WHERE  avalibility= 'YES'";

$result11=$con->query($sql11);

echo "<table align='center' table border=1>
	<tr>
	<th>Movie ID </th>
	<th>Movie Title </th>
	</tr>";
	
if ($result11->num_rows> 0){
while($row= $result11->fetch_assoc()){
			
	echo "<td>".$row["id"]. "</td>";
	echo "<td>".$row["name"]. "</td>";
	echo "</tr>";
			
}
}
echo "</table>";


//-------------------------------------------

echo "<br> The movies not avaliable in the library: <br>";
$sql12= "SELECT id, name FROM movies WHERE  avalibility= 'NO'";

$result12=$con->query($sql12);

echo "<table align='center' table border=1>
	<tr>
	<th>Movie ID </th>
	<th>Movie Title </th>
	</tr>";
	
if ($result12->num_rows> 0){
while($row= $result12->fetch_assoc()){
			
	echo "<td>".$row["id"]. "</td>";
	echo "<td>".$row["name"]. "</td>";
	echo "</tr>";
			
}
}
echo "</table>";


//-------------------------------------------

echo "<br><br>Borrow book records of all users: ";

$sql5="SELECT borrowbook.userId, users.name, books.booktitle, borrowbook.borrowDate, returnbook.returnDate,
(returnbook.returnDate- borrowbook.borrowDate) AS totalDays, ((returnbook.returnDate- borrowbook.borrowDate)-14)*0.5 AS payment FROM users, books, borrowbook, returnbook 
WHERE books.bookid = borrowbook.bookId AND users.id=borrowbook.userId AND borrowbook.userId=returnbook.userId AND borrowbook.bookId=returnbook.bookId";



$result5=$con->query($sql5);

echo "<table align='center' table border=1>
	<tr>
	<th> User ID</th>
	<th>Name </th>
	<th>Book Title </th>
	<th>Borrow Date </th>
	<th>Return Date </th>
	<th>Borrowed Days </th>
	<th>Overdue Payment </th>
	</tr>";


if ($result5->num_rows> 0){
		while($row= $result5->fetch_assoc()){
			if ($row["payment"] >0){
				echo"<tr>";
				echo "<td>".$row["userId"]. "</td>";
				echo "<td>".$row["name"]. "</td>";
				echo "<td>".$row["booktitle"]. "</td>";
				echo "<td>".$row["borrowDate"]. "</td>";
				echo "<td>".$row["returnDate"]. "</td>";
				echo "<td>".$row["totalDays"]. "</td>";
				echo "<td>$".$row["payment"]. "</td>";
				echo "</tr>";
				
			}
			else{
				echo"<tr>";
				echo "<td>".$row["userId"]. "</td>";
				echo "<td>".$row["name"]. "</td>";
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
//-------------------------------------------------------------
echo "<br><br>Borrow movies records of all users: ";

$sql6="SELECT borrowmovie.userId, users.name AS Name, movies.name, borrowmovie.borrowDate, returnmovie.returnDate, 
(returnmovie.returnDate- borrowmovie.borrowDate) AS totalDays, ((returnmovie.returnDate- borrowmovie.borrowDate)-14)*0.5 AS payment FROM users, movies, borrowmovie, returnmovie 
WHERE movies.id = borrowmovie.movieId AND users.id=borrowmovie.userId AND borrowmovie.userId=returnmovie.userId AND borrowmovie.movieId=returnmovie.movieId";



$result6=$con->query($sql6);

echo "<table align='center' table border=1>
	<tr>
	<th> User ID</th>
	<th>Name </th>
	<th>Movie Title </th>
	<th>Borrow Date </th>
	<th>Return Date </th>
	<th>Borrowed Days </th>
	<th>Overdue Payment </th>
	</tr>";


if ($result6->num_rows> 0){
		while($row= $result6->fetch_assoc()){
			if ($row["payment"] >0){
				echo"<tr>";
				echo "<td>".$row["userId"]. "</td>";
				echo "<td>".$row["Name"]. "</td>";
				echo "<td>".$row["name"]. "</td>";
				echo "<td>".$row["borrowDate"]. "</td>";
				echo "<td>".$row["returnDate"]. "</td>";
				echo "<td>".$row["totalDays"]. "</td>";
				echo "<td>$".$row["payment"]. "</td>";
				echo "</tr>";
				
			}
			else{
				echo"<tr>";
				echo "<td>".$row["userId"]. "</td>";
				echo "<td>".$row["Name"]. "</td>";
				echo "<td>".$row["name"]. "</td>";
				echo "<td>".$row["borrowDate"]. "</td>";
				echo "<td>".$row["returnDate"]. "</td>";
				echo "<td>".$row["totalDays"]. "</td>";
				echo "<td>$0</td>";
				echo "</tr>";
				
			
			
			}
			
		}
}
		

?>
</table>

<p>
<br><input type="button" class="button" value="Back to Admin Page" onclick="window.location.href='userpage_admin.php'"/></br></p>




</body>
</html>