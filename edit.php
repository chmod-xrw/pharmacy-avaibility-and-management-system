<?php
include_once("connection.php");
session_start();
if(isset($_POST['submit']))
{	

	$id = $_POST['id'];
	$uname = $_POST['uname'];
	
	$email = $_POST['email'];	
	
	if(empty($uname) || empty($email)) {	
			
		if(empty($uname)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
	
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}		
	}  
	if($_SESSION['pos']=="phar")
	{	
		$result=mysqli_query($con,"SELECT * FROM pharmacist WHERE uname='$uname'");
		$row=mysqli_fetch_array($result);
		if($row>0)
		{
			echo '<script language="javascript">';
			echo 'alert("User Already Exist pls use another name")';  
			echo '</script>';			
		}
		else
		{
			$result1 = mysqli_query($con, "UPDATE pharmacist SET uname='$uname', email='$email' WHERE pid='$id'");
			header("Location: apharmacist.php");
		}
	}
	if($_SESSION['pos']=="vendor")
	{
		$result=mysqli_query($con,"SELECT * FROM vendor WHERE uname='$uname'");
		$row=mysqli_fetch_array($result);
		if($row>0){
			echo '<script language="javascript">';
			echo 'alert("User Already Exist pls use another name")';  
			echo '</script>';
				
		}
		else
		{
			$result1 = mysqli_query($con, "UPDATE vendor SET uname='$uname', email='$email' WHERE vid='$id'");
			header("Location: apharmacist.php");
		}
	}
}
?>
<?php
if(!isset($_POST['submit']))
{
$eid = $_GET['id'];
if($_SESSION['pos']=="phar")
{
	$result = mysqli_query($con, "SELECT * FROM pharmacist WHERE pid=$eid");
}
if($_SESSION['pos']=="vendor")
{
	$result = mysqli_query($con, "SELECT * FROM vendor WHERE vid=$eid");
}
while($res = mysqli_fetch_array($result))
{
	$uname = $res['uname'];
	$email = $res['email'];
}
}
?>
<html>
<head>	
	<title>Edit Data</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>

<body>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td><label for="name">Name<label></td>
				<td><input type="text" name="uname" value="<?php echo $uname;?>"></td>
			</tr>
			<tr> 
				<td><label for="email">Email</label></td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $eid;?>></td>
				<td><input type="submit" name="submit" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
