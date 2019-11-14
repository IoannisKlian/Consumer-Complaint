<?php  

	include ("../connect.php");

	$username = stripslashes($_POST['username']);
	$password = stripslashes($_POST['password']);

	$username = mysqli_real_escape_string($connection, $username);
	$password = mysqli_real_escape_string($connection, $password);

	$result = mysqli_query($connection, "SELECT * FROM govrn_emp WHERE username = '$username' AND password = '$password'");
	$row = mysqli_fetch_array($result);
	
	
	if ($row['username'] == $username && $row['password'] == $password ) {
		session_start();
		$_SESSION["user"] = true;
		$_SESSION["id"] = $row['id'];
		$_SESSION["user_name"] = $row['username'];
		$_SESSION["name"] = $row['name'];
		
		header("Location: employeeIndex.php");
	}
	else {
		session_start();
		$_SESSION['errorinput'] = true;
		header("Location: login.php");

	}
?>