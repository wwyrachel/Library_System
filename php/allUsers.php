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
<title>Edit Users Information</title>
<body>
<h1>Edit Users Information</h1>
<p>Admin is allowed to edit users' information</p>
<?php 
session_start();
require "connection.php";
$sql="SELECT * FROM users";
$result=$con->query($sql);

	echo "<table align='center' table border=1>
	<tr>
	<th>Name </th>
	<th>Username</th>
	<th>Password </th>
	<th>Age </th>
	<th>Phone </th>
	<th>Email </th>
	<th>Address </th>
	<th>Parent Phone</th>
	<th>Type</th>
	</tr>";

		
	if ($result->num_rows> 0){
		while($row= $result->fetch_assoc()){
			echo"<tr>  <form method=post>";
			
			echo "<td><input type= text name=name value='".$row['name']."'></td>";
			echo "<td><input type= text name=username value='".$row['username']."'></td>";
			echo "<td><input type= password name=pass value='".$row['password']."'></td>";
			echo "<td><input type= text name=age value='".$row['age']."'></td>";
			echo "<td><input type= text name=phone value='".$row['phone']."'></td>";
			echo "<td><input type= text name=email value='".$row['email']."'></td>";
			echo "<td><input type= text name=address value='".$row['address']."'></td>";
			echo "<td><input type= text name=parent_phone value='".$row['parent_phone']."'></td>";
			echo "<td><input type= text name=type value='".$row['type']."'></td>";
			echo"<td><input type=hidden name=id value='".$row['id']."'></td>";
			echo"<td><input type='submit' name='submit' value='submit'>";
			
			echo "</form></tr>";
		}
	}
	

if (isset($_POST["submit"])){
	$id= $_POST["id"];
	$username=$_POST["username"];
	$name= $_POST["name"];
	$age=$_POST["age"];
	$phone=$_POST["phone"];
	$email=$_POST["email"];
	$address=$_POST["address"];
	$pass=$_POST["pass"];
	$parent_phone=$_POST["parent_phone"];
	$type=$_POST["type"];
	
	

	if (empty($name) || empty($age)|| empty($phone)){
		echo "Name, Age and Phone are required!!";
		}
	
	else{
		$sql2="UPDATE users SET name='$_POST[name]', age='$_POST[age]', phone='$_POST[phone]', email='$_POST[email]', address='$_POST[address]'			
		, password='$_POST[pass]', parent_phone='$_POST[parent_phone]', type='$_POST[type]' WHERE id='$_POST[id]'";
			
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
?>

</table>


<p>
<br><input type="button" class="button" value="Back to Admin Page" onclick="window.location.href='userpage_admin.php'"/></br></p>



</body>
</html>
