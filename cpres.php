<?php
include_once('connection.php');
session_start();
if(isset($_SESSION['cid']))
{
	$uname=$_SESSION['uname'];
	$cid=$_SESSION['cid'];
	$name=$_SESSION['name'];
	$no=$_SESSION['no'];
}
else
{
	header("Location: index.php");
    exit;
}
if(isset($_POST['submit']))
{
	if((($_FILES["file"]["type"] == "image/gif") 
		||($_FILES["file"]["type"] == "image/jpeg") 
		|| ($_FILES["file"]["type"] == "image/pjpeg")) && ($_FILES["file"]["size"] < 20000)) 
		{
			if($_FILES["file"]["error"]>0) 
			{ 
					echo '<script language="javascript">';
					echo 'alert("Error in uploading please try again..!")';  
					echo '</script>';
			}	 
			else 
			{ 
				$image = $_FILES['file']['tmp_name'];
				$image = addslashes(file_get_contents($image));
				$qry="insert into prescription (cid,name,contact,pic) values ('$cid','$name','$no','$image')";
				$result=mysqli_query($con,$qry);
				$qry1="insert into record (cid,name,contact,pic) values ('$cid','$name','$no','$image')";
				$result1=mysqli_query($con,$qry1);
				if($result)
				{
					echo '<script language="javascript">';
					echo 'alert("Image Uploaded Succesfully")';  
					echo '</script>';
				}
				
			}
		}
		else
		{
			echo '<script language="javascript">';
			echo 'alert("Invalid file or too large")';  
			echo '</script>';
		}
		
		
		
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style1.css">
<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>

<div class="sidenav">
  <a href="cindex.php">About</a>
  <a href="cpres.php">Send Prescription</a>
  <a href="chistory">Past Prescription</a>
  <a href="logout.php">Logout</a>
</div>

<div class="main">
<form name="customer" action="cpres.php" method="post" enctype="multipart/form-data">
<table>
<td><label for="file">Prescription:</label></td>
<td><input type="file" name="file" id="file"></td>
</tr>
</table><br>
<input type="submit" name="submit" value="Submit">
</form>
</div>
</body>
</html>