<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
	<div id="login-form">
			<form action="auth.php" method="POST">
				<label> Username:</label>
				<input type="text" name="username" id="username" required>
				<label> Password:</label>
				<input type="text" name="password" id="password" required>
				<input type="submit" value="Login" id="btn">
			</form>
	</div>
</body>
</html>