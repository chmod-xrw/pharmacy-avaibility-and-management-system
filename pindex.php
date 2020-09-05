<?php
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
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body background="mk.jpg">

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
	<h1>Welcome <?php echo $uname;?></h1> 
</div>
</html>