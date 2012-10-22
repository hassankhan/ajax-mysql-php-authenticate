<?php
	include('auth.php');
	
	session_start();
	unset($_SESSION['SESS_ID']);
	unset($_SESSION['SESS_USERNAME']);
	unset($_SESSION['SESS_PASSWORD']);
	unset($_SESSION['SESS_USERTYPE']);
	header("location: index.php");
?>