<?php
	session_start();
	if (!isset($_SESSION['id'])) {
		header("Location: login.php");
	}
	else{
		$userID=$_SESSION['id'];
		$complaintID = $_SESSION['complaintID'];
	}

	$userID=$_SESSION['id'];
	$complaintID = $_SESSION['complaintID'];
	include ("../connect.php");

	

	mysqli_query($connection,"INSERT INTO employee_complaint VALUES ( DEFAULT ,'".$userID."', '".$complaintID."', now())");

	mysqli_query($connection,'UPDATE complaint SET status = 1 WHERE id ="'.$complaintID.'"');


	echo '<script type="text/javascript">','location.replace("employee_index.php");','</script>';

	
	

?>
