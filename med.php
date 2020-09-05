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

				<th>Medicine Name</th>
				<th>Medicine Quantity</th>

			</tr>
<?php
$no=$_POST["no"];

//  echo "<td>".$mn[$p]."</td>";
print"<form method=post action=billing.php>";
print"<input type=hidden name=no value= $no />";
for($i=1;$i<=$no;$i++)
{echo "<tr>";
echo "<td>";
  echo "<input type=text name=med$i placeholder=medicine name />";
echo "</td>";
echo "<td>";
  echo"<input type=text name=quan$i placeholder=quantity />";
echo "</td>";
  echo "</tr>";
//  print"<br>";
}
echo "<tr>";
echo "<td>";
echo "</td>";
echo "<td>";
echo "</td>";
echo "</tr>";
echo"<tr>";
echo "<td>";
echo "</td>";
echo"<td>";
print "<input type=submit value=Submit />";
echo"</td>";
echo"</tr>";
print"</form>";
?>
</table>
</div>
</body>
</html>
