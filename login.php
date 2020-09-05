<?php
include_once('connection.php');
if(isset($_POST['submit']))
{
	$uname=$_POST["uname"];
	$pass=$_POST["pass"];

	$pos=$_POST["pos"];
	if($uname=="" || $pass=="" || $pos=="")
	{
		echo '<script language="javascript">';
		echo 'alert("Empty Field please fill All details")';  
		echo '</script>';
	}
	switch($pos)
	{
	case 'admin':
		$result=mysqli_query($con,"SELECT aid, uname FROM admin WHERE uname='$uname' AND password='$pass'");
		$row=mysqli_fetch_array($result);
		if($row>0){
		session_start();
		$_SESSION['aid']=$row[0];
		$_SESSION['uname']=$row[1];
		header('Location: aindex.php');
		}else{
			echo '<script language="javascript">';
			echo 'alert("Invalid login please try again")';  
			echo '</script>';
		}
	break;
	case 'phar':
		$result=mysqli_query($con,"SELECT * FROM pharmacist WHERE uname='$uname' AND password='$pass'");
		$row=mysqli_fetch_array($result);
		if($row>0){
		session_start();
		$_SESSION['pid']=$row[0];
		$_SESSION['uname']=$row[1];
		$_SESSION['name']=$row[2];
		$_SESSION['email']=$row[4];
		$_SESSION['no']=$row[5];
		header('Location: pindex.php');
		}else{
			echo '<script language="javascript">';
			echo 'alert("Invalid login please try again")';  
			echo '</script>';
		}
	break;
	case 'customer':
		$result=mysqli_query($con,"SELECT * FROM customer WHERE uname='$uname' AND password='$pass'");
		$row=mysqli_fetch_array($result);
		if($row>0){
		session_start();
		$_SESSION['cid']=$row[0];
		$_SESSION['uname']=$row[1];
		$_SESSION['name']=$row[2];
		$_SESSION['email']=$row[4];
		$_SESSION['no']=$row[5];
		header('Location: cindex.php');
		}
		else{
			echo '<script language="javascript">';
			echo 'alert("Invalid login please try again")';  
			echo '</script>';
		}
	break;
	case 'vendor':
		$result=mysqli_query($con,"SELECT * FROM vendor WHERE uname='$uname' AND password='$pass'");
		$row=mysqli_fetch_array($result);
		if($row>0){
		session_start();
		$_SESSION['vid']=$row[0];
		$_SESSION['uname']=$row[1];
		header('Location: vindex.php');
		}else{
			echo '<script language="javascript">';
			echo 'alert("Invalid login please try again")';  
			echo '</script>';
		}
	break;
	}
}
?>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Registration Form</h2>
                    <form method="POST" >
                        <div class="row row-space">
                            <!--div class="col-2">
                                <div class="input-group">
                                    <label class="label">first name</label>
                                    <input class="input--style-4" type="text" name="first_name">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">number</label>
                                    <input class="input--style-4" type="text" name="number">
                                </div>
                            </div-->
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Username</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4" type="text" name="uname">
                                        <!--i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i-->
                                    </div>
                                </div>
                            </div>
                            <!--div class="col-2">
                                <div class="input-group">
                                    <label class="label">upload photo</label>
									<div class="input-group-icon">
                                        <input class="input--style-4" type="file" name="photo">
                                    <!--div class="p-t-10">
                                        <label class="label">Ma
                                            <input type="radio" checked="checked" name="gender">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input type="radio" name="gender">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div-->
                        </div>
                        <div class="row row-space">
                            <!--div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email">
                                </div>
                            </div-->
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Password</label>
                                   <input class="input--style-4" type="password" name="pass">
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="label">Roles</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="pos">
                                    <option disabled="disabled" selected="selected">Choose option</option>
                                    <option value="admin">Admin</option>
			<option value="phar">Pharmacist</option>
			<option value="vendor">Vendor</option>
			<option value="customer">Customer</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->