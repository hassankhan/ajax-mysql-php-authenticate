<!DOCTYPE html>

<html>
<head>
<title>Student Login</title>
<link rel="stylesheet" type="text/css" href="Style.css" />
</head>
<body>
<h1>Student Login</h1>
	<form action="login_logic.php" method="post">
		<ul>
			<li>
				<label for="username">Username</label>
				<input id="username" name="username" type="text" />
			</li>
			<li>
				<label for="password">Password</label>
				<input id="password" name="password" type="password" />
			</li>
			<input name="accounttype" type="hidden" value="student" />
		</ul>
		<input type="submit" name="submit" value="Login" />
	</form>
</body>
</html>