<?php
include_once('../config.php');
session_start();
  $username = $_POST['username'];
  $pass = $_POST['pass'];
  
	$query = "SELECT * FROM admin_login WHERE username = '$username' AND pass = '$pass'";

	$result = mysqli_query($con,$query);
    // print_r($result);exit;
	$res = mysqli_num_rows($result);
	if($res == 1)
	{
		$_SESSION['aid']=$res;
	
		header('location:../covid2/dashboard.php');
	 }
	 else
	 {
	 	echo "<script type='text/javascript'> alert('Login Failed.');window.location='index.html' </script>";
	 }
	
?>