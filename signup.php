<?php
include_once('connection.php');
if(isset($_POST['submit']))
{
	$uname=$_POST["uname"];
	$name=$_POST["name"];
	$no=$_POST["no"];
	$email=$_POST["email"];
	$pass=$_POST["pass"];
	$pos=$_POST["position"];
	if($uname=="" || $email=="" || $pass=="" || $pos=="")
	{
		echo '<script language="javascript">';
		echo 'alert("Empty Field please fill All details")';  
		echo '</script>';
	}
	switch($pos)
	{
	case 'customer':
		$result=mysqli_query($con,"SELECT * FROM customer WHERE uname='$uname'");
		$row=mysqli_fetch_array($result);
		if($row>0)
		{
			echo '<script language="javascript">';
			echo 'alert("User Already Exist pls use another name")';  
			echo '</script>';
		}
		else
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
					$qry="insert into customer (uname,name,password,email,contact,propic) values ('$uname','$name','$pass','$email','$no','$image')";
					$result=mysqli_query($con,$qry);
					if($result)
					{
						echo '<script language="javascript">';
						echo 'alert("Succesfull Sign up")';  
						echo '</script>';
						header('Location: index.php');
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
	break;
	case 'phar':
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
					$qry="insert into pharmacist (uname,name,password,email,contact,propic) values ('$uname','$name','$pass','$email','$no','$image')";
					$result=mysqli_query($con,$qry);
					if($result)
					{
						echo '<script language="javascript">';
						echo 'alert("Succesfull Sign up")';  
						echo '</script>';
						header('Location: index.php');
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
	break;
	}
	case 'vendor':
		$result=mysqli_query($con,"SELECT * FROM vendor WHERE uname='$uname'");
		$row=mysqli_fetch_array($result);
		if($row>0)
		{
			echo '<script language="javascript">';
			echo 'alert("User Already Exist pls use another name")';  
			echo '</script>';
		}
		else
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
					$qry="insert into vendor (uname,name,password,email,contact,propic) values ('$uname','$name','$pass','$email','$no','$image')";
					$result=mysqli_query($con,$qry);
					if($result)
					{
						echo '<script language="javascript">';
						echo 'alert("Succesfull Sign up")';  
						echo '</script>';
						header('Location: index.php');
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
	break;
}
?>
<html>
<head>
<title>Signup Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
<body>
    <div class="loginbox">
    <img src="avatar.jpg" class="avatar">
        <h1>Login Here</h1>
        <form action="signup.php" method="post" enctype="multipart/form-data">
			<p>Name</p>
            <input type="text" name="name" placeholder="Enter Name">
			<p>Contact</p>
            <input type="number" name="no" placeholder="Enter Contact No.">
            <p>Username</p>
            <input type="text" name="uname" placeholder="Enter Username">
			<p>Email</p>
            <input type="email" name="email" placeholder="Enter email">
            <p>Password</p>
            <input type="password" name="pass" placeholder="Enter Password">
			<p>Profile Pic</p>
			<input type="file" name="file" id="file">
			<p>Select Position</p>
			<select name="position">
			<option>--Select position--</option>
			<option value="phar">Pharmacist</option>
			<option value="customer">Customer</option>
			</select>
            <input type="submit" name="submit" value="submit">
        </form>
    </div>
</body>
</head>
</html>