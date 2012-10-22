<?php include('auth.php'); ?>
<!DOCTYPE html>

<html>
<head>
<title>Add Course</title>
<link rel="stylesheet" type="text/css" href="Style.css" /> 
</head>
<body>
	<div id="main">
		<div id="content">
			<h1>View Available Courses</h1>
			<?php 
				require_once('config.php');
				
				$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
				if(!$link){
					die('Failed to connect to server: ' . mysql_error());
				}
				$db = mysql_select_db(DB_DATABASE);
				if(!$db){
					die("Unable to select database");
				}
				
				$qry="SELECT `course`.`level`,`course`.`subject`,`tutor`.`name` FROM `course`,`tutor` WHERE `course`.`tutorid` = `tutor`.`id`";
				
				$result = mysql_query($qry);
				
				while($row = mysql_fetch_assoc($result)){
					print("{$row['level']}<br />" .
					"{$row['subject']}<br />" .
					"{$row['name']}<br />");
				}
			?>
		</div>
	</div>
</body>
</html>
