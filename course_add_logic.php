<?php
	//Start session and get the database connection details
	session_start(); require_once('config.php');
	
	//Variable declaration: create an array to store validation errors and a flag to identify errors
	$errMsg_arr = array(); $errFlag = false;
	
	//Connect to the uni database
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link){
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db(DB_DATABASE);
	if(!$db){
     	
		die("Unable to select database");
    
	}
	
	//Assign variable inputs to local variables
	$subject = $_POST['subject'];
	$level = $_POST['level'];
	$userid = $_SESSION['SESS_ID'];
	
	
	//Input Validations
	if($subject == ''){
		$errMsg_arr[] = 'Missing subject';
		$errFlag = true;
	}
	if($level == ''){
		$errMsg_arr[] = 'Missing level';
		$errFlag = true;
	}
	
	//If there were any mistakes (empty fields or duplicate usernames) then go back to registration page
	if($errFlag){
		$_SESSION['ERRMSG_ARR'] = $errMsg_arr;
		session_write_close();
		header("location: error.php");
		exit();
	}
	
	//Insert a record into database
	$qry = "INSERT INTO `course` (`id`, `tutorid`, `subject`, `level`) VALUES('','$userid','$subject','$level')";
	$result = mysql_query($qry);
	
	//Redirect to here if result is successful
	if($result){
		header("location: course_view.php");
		exit();
	}
	else{
		die("Query failed");
	}
?>
