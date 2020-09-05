<?php
include_once('connection.php');
error_reporting(E_ALL);
$query="SELECT * FROM `order`";
$result=mysqli_query($con,$query);

session_start();
$_SESSION['pos']="vendor";
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
  <a href="vindex.php">About</a>
  <a href="vmedicine.php">Notification</a>
  <a href="logout.php">Logout</a>
</div>

<div class="main">
		<table id="t01">

			<tr bgcolor='#cccc'>

				<th>Order id</th>
				<th>Pharmist Name</th>
				<th>Medicine Name</th>
				<th>Medicine Qty.</th>
				<th>Delete</th>
			</tr>


				<?php
            //error_reporting(E_NOTICE);
			    // $id=0;
           //$name=" ";
           //$mname=array();
          // $qty=array();
           //$j=0;
					while($res = mysqli_fetch_array($result))
					{
					echo "<tr>";
						echo "<td>".$res['oid']."</td>";
            //$id=$res['oid'];
						echo "<td>".$res['pname']."</td>";
            $name=json_encode (unserialize($res['mname']));
						echo "<td>".trim($name,"[]")."</td>";
            $mname= json_encode (unserialize($res['qty']));
						echo "<td>".trim($mname,'[]')."</td>";
          //  $qty[$j]= unserialize($res['qty']);
						echo "<td><a href=\"delete.php?id=$res[oid]\" onClick=\"return confirm('Are you sure you want to delete?')\"> delete</a> </td>";
						echo "</tr>";
          //  $j=$j+1;
					}
?>
		</table>
	</div>
</body>
</html>
