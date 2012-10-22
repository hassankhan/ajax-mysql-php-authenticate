<?php
	//Start session and get the database connection details
	session_start(); require_once('config.php');
	
	//Variable declaration: create an array to store validation errors and a flag to identify errors
	$errMsg_arr = array(); $errFlag = false;
	
	//Connect to the database
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link){
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db(DB_DATABASE);
	if(!$db){
     	
		die("Unable to select database");
    
	}

	//Get the variables sent to the PHP and store then in local variables
	$username = $_POST['username'];
	$password = $_POST['password'];
	$accounttype = $_POST['accounttype'];
	
	//Input Validations (checks if input is empty)
	if($username == ''){
		$errMsg_arr[] = 'Username missing';
		$errFlag = true;
	}
	if($password == ''){
		$errMsg_arr[] = 'Password missing';
		$errFlag = true;
	}
	
	//If there are input validations, redirect back to the login form
	if($errFlag){
		$_SESSION['ERRMSG_ARR'] = $errMsg_arr;
		session_write_close();
		header("location: error.php");
		exit();
	}
	
	//Create query
	$qry="SELECT * FROM `$accounttype` WHERE `USERNAME`='$username' AND `PASSWORD`='$password'";
	$result=mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result){
		if(mysql_num_rows($result) == 1){
			//Login Successful
			session_regenerate_id();
			$user = mysql_fetch_assoc($result);
			//Put session details in cookie
			if($accounttype == 'student'){
				$_SESSION['SESS_ID'] = $user['idstudent'];
			} 
			else {
				$_SESSION['SESS_ID'] = $user['idtutor'];
			}
			$_SESSION['SESS_USERNAME'] = $user['username'];
			$_SESSION['SESS_PASSWORD'] = $user['password'];
			$_SESSION['SESS_USERTYPE'] = $accounttype;
			session_write_close();
			header("location: login_index.php");
			exit();
		}
		else{
			//Login failed
			header("location: error.php");
			exit();
		}
	}
	else{
		die("Query failed");
	}
?>
