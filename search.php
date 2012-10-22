<?php include('auth.php'); ?>
<!DOCTYPE html>

<html>
<head>
<title>Search</title>
<link rel="stylesheet" type="text/css" href="Style.css" /> 
</head>
<body>
	<div id="main">
		<div id="content">
			<h1>Search</h1>
			<form action="" method="post">
				<ol>
					<li>
						<label for="subject">Subject</label>
						<input id="subject" name="subject" type="text" required autofocus />
					</li>
					<li>
						<label for="level">Level</label>
						<input id="level" name="level" type="text" required />
					</li>
				</ol>
				<input type="submit" name="submit" value="Add" />
			</form>
		</div>
	</div>
</body>
</html>