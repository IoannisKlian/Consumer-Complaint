<?php  
	session_start();	

	include ("../connect.php");

	if (isset($_POST['username'])&&isset($_POST['password'])) {
		if (!empty($_POST['username']) && !empty($_POST['password'])) {
			$username = stripslashes($_POST['username']);
			$password = stripslashes($_POST['password']);

			$username = mysqli_real_escape_string($connection, $username);
			$password = mysqli_real_escape_string($connection, $password);

			$result = mysqli_query($connection, "SELECT * FROM govrn_emp WHERE username = '$username' AND password = '$password'");
			$row = mysqli_fetch_array($result);
			
			
			if ($row['username'] == $username && $row['password'] == $password ) {
				$_SESSION['user'] = true;
				$_SESSION['user_id'] = $row['id'];
				$_SESSION['user_name'] = $row['username'];
				$_SESSION['name'] = $row['name'];
				$_SESSION['admin'] = $row['admin'];
				
				header("Location: complaint-list/");
			}
			else {
				$_SESSION['errorinput'] = 1;
				header("Location: login.php");
			}
		}
	}
	else {
		session_start();
		header("Location: login.php");

	}
?>