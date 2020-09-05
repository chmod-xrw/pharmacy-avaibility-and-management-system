<?php
include_once('connection.php');
session_start();
if(!isset($_SESSION['uname']))
{
    header("Location: index.php");
    exit;
}
else
{
	$cid=$_SESSION['cid'];
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
  <a href="cindex.php">About</a>
  <a href="cpres.php">Send Prescription</a>
  <a href="chistory">Past Prescription</a>
  <a href="logout.php">Logout</a>
</div>

<div class="main">
	<table width='80%' border='0' id="t01">
		
			<tr bgcolor='#cccc'>
			
				<th>cid</th>
				<th>Prescription</th>
			
			</tr>
			
			<?php
				
					$query="SELECT * FROM record WHERE cid='$cid'";
					$result=mysqli_query($con,$query);
			
					while($res = mysqli_fetch_array($result))
					{
						echo "<tr>";
						echo "<td>".$res['cid']."</td>";
						echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $res['pic'] ).'"/></td>';
						echo "</tr>";	
					}
				?>
		
		</table>
	</div>	
</body>
</html>