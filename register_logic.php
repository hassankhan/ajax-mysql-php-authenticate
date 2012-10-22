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
	$account = $_POST['usertype'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$emailadd = $_POST['email'];
	
	echo $account;
	echo $firstname;
	echo $lastname;
	echo $username;
	echo $password;
	echo $emailadd;
	
	//Input Validations
	if($firstname == ''){
		$errMsg_arr[] = 'Missing first name';
		$errFlag = true;
	}	if($lastname == ''){
		$errMsg_arr[] = 'Missing last name';
		$errFlag = true;
	}	if($username == ''){
		$errMsg_arr[] = 'Missing username';
		$errFlag = true;
	}
	if($password == ''){
		$errMsg_arr[] = 'Missing password';
		$errFlag = true;
	}
	if($emailadd == ''){
		$errMsg_arr[] = 'Missing email address';
		$errFlag = true;
	}
	
	//Checks to ensure no one has used the same username
	if($username != ''){
		$qry = "SELECT * FROM `$account` WHERE username='$username'";
		$result = mysql_query($qry);
		if($result){
			if(mysql_num_rows($result) > 0) {
				$errMsg_arr[] = 'Username already exists';
				$errFlag = true;
			}
		}
		else{
			
			die("Query failed");
		}
	}
	
	//If there were any mistakes (empty fields or duplicate usernames) then go back to registration page
	if($errFlag){
		$_SESSION['ERRMSG_ARR'] = $errMsg_arr;
		session_write_close();
		header("location: register.php");
		exit();
	}

	//Insert a record into database
	if($account == 'student'){
		$qry = "INSERT INTO `student` (`firstname`, `secondname`, `email`, `USERNAME`, `PASSWORD`) VALUES ('$firstname', '$lastname', '$emailadd', '$username', '$password')";
	} else {
		$qry = "INSERT INTO `tutor` (idtutor, firstName, lastName, email, postcode, level, instituition, qualifications, USERNAME, PASSWORD) VALUES ('','$firstname','$lastname','$emailadd','','','','','$username','$password')";
	}
	
	// $qry = "INSERT INTO `$account` (`idstudent`, `firstname`, `username`, `password`, `email`) VALUES('','$fullname','$username','$password','$emailadd')";
	$result = mysql_query($qry);
	
	//Redirect to here if result is successful
	if($result){
		header("location: index.php");
		exit();
	} else{
		die("Query failed");
	}
?>
