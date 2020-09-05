<?php
include_once('connection.php');
$query="SELECT * FROM record";
$result=mysqli_query($con,$query);
session_start();
$_SESSION['pos']="prescription";
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
.avatar {
  vertical-align: middle;
  width: 50px;
  height: 50px;
  border-radius: 50%;
}
</style>
<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>

<div class="sidenav">
  <a href="pindex.php">About</a>
  <a href="pmedicine.php">Medicine</a>
  <a href="med1.html">Billing</a>
  <a href="precord.php">Customer Record</a>
  <a href="pvendor.php">Contact Vendor</a> 
  <a href="ppres.php">Notification</a>
  <a href="logout.php">Logout</a>
</div>

<div class="main">
		<table id="t01">
		
			<tr bgcolor='#cccc'>
				<th>Customer id</th>
				<th>Customer name</th>
				<th>Customer no.</th>
				<th>Prescription</th>
			</tr>
			
				<?php
					while($res = mysqli_fetch_array($result))
					{
						echo "<tr>";
						echo "<td>".$res['cid']."</td>";
						echo "<td>".$res['name']."</td>";
						echo "<td>".$res['contact']."</td>";
						echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $res['pic'] ).'"/></td>';
						echo "</tr>";	
					}
				?>
		</table>
	</div>	
</body>
</html>