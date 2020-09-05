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
	$uname=$_SESSION['uname'];
}
$qty="";
if(isset($_POST['add']))
{
	$mname=$_POST["mname"];
	$qty=$_POST["qty"];
	$result = mysqli_query($con, "UPDATE medicine SET quantity=quantity + '$qty' WHERE mname='$mname'");
	$result2 = mysqli_query($con, "insert into medicinetrace (mname,qty) values ('$mname','$qty')");
	header("Location: pmedicine.php");
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
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="style1.css">
<link rel="stylesheet" type="text/css" href="style2.css">
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
  <form action="pmedicine.php" method="post">
    <label for="mname">Name of Medicine</label>
    <input type="text" name="mname" placeholder="enter medicine name.." class="auto">

    <label for="qty">Quantity</label>
    <input type="number" name="qty" placeholder="Quantity">
	<label><?php echo $qty; ?></label>
    <input type="submit" name="add" value="add">
	<table width='80%' border='0' id="t01">
		
			<tr bgcolor='#cccc'>
			
				<th>Medicine Name</th>
				<th>Company Name</th>
				<th>Qtantity</th>
				<th>Price</th>
				<th>Exp Date</th>
			
			</tr>
			
			<?php
				
					$query="SELECT * FROM medicine";
					$result=mysqli_query($con,$query);
			
					while($res = mysqli_fetch_array($result))
					{
						echo "<tr>";
						echo "<td>".$res['mname']."</td>";
						echo "<td>".$res['cmpname']."</td>";
						echo "<td>".$res['quantity']."</td>";
						echo "<td>".$res['price']."</td>";
						echo "<td>".$res['exp']."</td>";
						echo "</tr>";	
					}
				?>
		
		</table>
  </form>
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>    
<script type="text/javascript">
$(function() {
    
    //autocomplete
    $(".auto").autocomplete({
        source: "search.php",
        minLength: 1
    });                

});
</script>
</div>

</body>
</html>
</div>
</html>