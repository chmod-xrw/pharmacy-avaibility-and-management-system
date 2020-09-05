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
<?php include'customer.php';?>
<link rel="stylesheet" type="text/css" href="style1.css
">
</head>
<body background="mk.jpg">

<!--div class="sidenav">
  <a href="cindex.php">About</a>
  <a href="cpres.php">Send Prescription</a>
  <a href="chistory">Past Prescription</a>
  <a href="logout.php">Logout</a>
</div>

<div class="main">
	<h1>Welcome <?php echo $uname;?></h1> 
</div-->
</html>