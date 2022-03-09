<?php
	session_start();
	session_destroy();
 
	if (isset($_COOKIE["user"])){
		setcookie("user", '', time() - (3600));
		$_SESSION["admin"]='';
	}
 
	header('location:home.php');
 
?>