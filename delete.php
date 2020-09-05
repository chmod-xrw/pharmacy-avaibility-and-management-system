<?php
	include("connection.php");
	session_start();
	if($_SESSION['pos']=="phar")
	{
		$id = $_GET['id'];
		$result = mysqli_query($con,"DELETE FROM pharmacist WHERE pid = '$id' ");
		header("Location:aindex.php");
	}
	if($_SESSION['pos']=="vendor")
	{
		$id = $_GET['id'];
		$result = mysqli_query($con,"DELETE FROM vendor WHERE vid = '$id' ");
		header("Location:aindex.php");
	}
	if($_SESSION['pos']=="prescription")
	{
		$id = $_GET['id'];
		$result = mysqli_query($con,"DELETE FROM prescription WHERE pid = '$id' ");
		header("Location:ppres.php");
	}
	
?>