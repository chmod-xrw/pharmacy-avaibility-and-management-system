<?php   
session_start(); 
session_destroy(); 
header("location:/new pro/index.php");
exit();
?>