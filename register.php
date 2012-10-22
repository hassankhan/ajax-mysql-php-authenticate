<!DOCTYPE html>

<html>
<head>
<title>Register</title>
<link rel="stylesheet" type="text/css" href="Style.css" /> 
</head>
<body>
	<div id="main">
		<div id="content">
			<h1>Register</h1>
			<form action="register_logic.php" method="post">
				<ol>
					<?php echo $_SESSION['ERRMSG_ARR']; ?>
					<li>
						<label for="usertype">Account Type</label>
						<ul>
							<li>
								<label for="student">Student</label>
								<input id="student" name="usertype" value="student" type="radio" />
							</li>
							<li>
								<label for="tutor">Tutor</label>
								<input id="tutor" name="usertype" value="tutor" type="radio" />
							</li>
						</ul>
					</li>
					<li>
						<label for="firstname">First name</label>
						<input id="firstname" name="firstname" type="text" placeholder="First name" required />
					</li>
					<li>
						<label for="lastname">Last name</label>
						<input id="lastname" name="lastname" type="text" placeholder="Last name" required />
					</li>
					<li>
						<label for="username">Username</label>
						<input id="username" name="username" type="text" />
					</li>
					<li>
						<label for="password">Password</label>
						<input id="password" name="password" />
					</li>
					<li>
						<label for="email">Email Address</label>
						<input id="email" name="email" type="email" required />
					</li>
				</ol>
				<input type="submit" name="submit" value="Register" />
			</form>
		</div>
	</div>
</body>
</html>