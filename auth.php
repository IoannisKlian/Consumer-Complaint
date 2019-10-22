<?php  

	include ("connect.php");

	$username = stripslashes($_POST['username']);
	$password = stripslashes($_POST['password']);

	$username = mysqli_real_escape_string($connection, $username);
	$password = mysqli_real_escape_string($connection, $password);

	$result = mysqli_query($connection, "SELECT * FROM Users WHERE Username = '$username' AND Password = '$password'");
	$row = mysqli_fetch_array($result);
	
	if ($row['Username'] == $username && $row['Password'] == $password) {
		session_start();
		$_SESSION["user"] = true;
		$_SESSION["id"] = $row['id'];
		$_SESSION["user_name"] = $row['First Name'];
		$_SESSION["password"] = $row['Last Name'];
		
		header("Location: index.php");
	}
	else {
		session_start();
		$_SESSION['errorinput'] = true;
		header("Location: login.php");

	}
?>