<?php
session_start();
$_SESSION['pos']="vendor";
include_once('connection.php');
$query="SELECT * FROM vendor";
$result=mysqli_query($con,$query);
if(!isset($_SESSION['uname']))
{
    header("Location: index.php");
    exit;
}
else
{
	$uname=$_SESSION['uname'];
}
?>
<html>
<head>
<style>
table {
  width:100%;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
  text-align: left;
}
table#t01 tr:nth-child(even) {
  background-color: #eee;
}
table#t01 tr:nth-child(odd) {
 background-color: #fff;
}
table#t01 th {
  background-color: black;
  color: white;
}
</style>
<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>

<div class="sidenav">
  <a href="aindex.php">Home</a>
  <a href="apharmacist">Pharmacist</a>
  <a href="avendor.php">Vendor</a>
  <a href="logout.php">Logout</a>
</div>

<div class="main">

	<table width='80%' border=0 id="t01">

	<tr >
		<th>NAME</th>
		<th>ID</th>
		<th>EMAIL-ID</th>
		<th>UPDATE</th>
	</tr>
	<?php  
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['uname']."</td>";
		echo "<td>".$res['vid']."</td>";
		echo "<td>".$res['email']."</td>";	
		echo "<td><a href=\"edit.php?id=$res[vid]\">Edit</a> | <a href=\"delete.php?id=$res[vid]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>	

</div>
</html>