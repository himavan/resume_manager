<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
	

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		unset($_SESSION['rid']);
		unset($_SESSION['auth']);
		unset($_SESSION['auth_type']);
		header("location: login.php");
	}
?>