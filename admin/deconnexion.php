<?php
	session_start();
	session_destroy();
	$_SESSION=array();
	$_SESSION['status']=false;
	header('location:login.php');
?>