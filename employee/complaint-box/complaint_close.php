<?php
	session_start();
	if (!isset($_SESSION['user_id'])) {
		header("Location: ../login.php");
	}
	else{
		$userID=$_SESSION['user_id'];
		$complaintID = $_SESSION['complaintID'];
	}

	$userID=$_SESSION['user_id'];
	$complaintID = $_SESSION['complaintID'];
	include ("../../connect.php");

	date_default_timezone_set('Europe/Athens');
		
    $data_to_update = "Έγινε κλείσιμο από ".$_SESSION["name"]."";
    mysqli_query($connection,"INSERT INTO log (`description`, `datetime`, `complaint_id`) 
    							VALUES ('".$data_to_update."','".date('Y-m-d H:i:s')."','".$complaintID."')");

	mysqli_query($connection,'UPDATE complaint SET status = 2 WHERE id ="'.$complaintID.'"');

	echo '<script type="text/javascript">','location.replace("../complaint-list/");','</script>';

?>

