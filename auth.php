<?php
	//Start session
	session_start();
	
	//Check whether the session variable SESS_ID is present or not
	if(!isset($_SESSION['SESS_ID']) || (trim($_SESSION['SESS_ID']) == '')) 
	{
		$errMsg_arr[] = 'Access Denied - Please login';
		$_SESSION['ERRMSG_ARR'] = $errMsg_arr;
		header("location: error.php");
		exit();
	}
?>