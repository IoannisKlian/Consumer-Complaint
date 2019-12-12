<?php
	session_start();
	if (!isset($_SESSION['id'])) {
		header("Location: login.php");
	}
	else{
		$userID=$_SESSION['id'];
		$complaintID = $_SESSION['complaintID'];
	}

	if (isset($_POST["session_ID"])) {
    	$userID = $_POST["session_ID"];
  	}

	$userID=$_SESSION['id'];
	$complaintID = $_SESSION['complaintID'];
	include ("../../connect.php");

	

	mysqli_query($connection,"INSERT INTO employee_complaint VALUES ( '".$userID."', '".$complaintID."', now())");

    date_default_timezone_set('Europe/Athens');
		
    $data_to_update = "Έγινε ανάληψη από ".$_SESSION["name"]."";
    mysqli_query($connection,"INSERT INTO log (`description`, `datetime`, `complaint_id`) 
    							VALUES ('".$data_to_update."','".date('Y-m-d H:i:s')."','".$complaintID."')");

	mysqli_query($connection,'UPDATE complaint SET status = 1 WHERE id ="'.$complaintID.'"');


	echo '<script type="text/javascript">','location.replace("../complaint-list");','</script>';

	
	

?>
