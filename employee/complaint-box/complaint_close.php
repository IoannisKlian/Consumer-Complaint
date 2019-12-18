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

	$sql = "SELECT * FROM complaint_log WHERE complaint_id = ".$complaintID." ";
    $res_data = mysqli_query($connection,$sql);
    $data_to_update ="";

    while($row = mysqli_fetch_array($res_data)){

    	$data_to_update = $row['log'];
    }
    date_default_timezone_set('Europe/Athens');
	

	$log_id = get_last_log_id($data_to_update) + 1;

    $data_to_update.= "<end_of_log>".$log_id.". <log_id> Έγινε κλείσιμο καταγγελίας από ".$_SESSION["name"]." <date_of_log> - ".date('Y-m-d H:i:s');
    mysqli_query($connection,'UPDATE complaint_log SET log = "'.$data_to_update.'" WHERE complaint_id ="'.$complaintID.'"');

	mysqli_query($connection,'UPDATE complaint SET status = 2 WHERE id ="'.$complaintID.'"');

	echo '<script type="text/javascript">','location.replace("../complaint-list/");','</script>';

	function get_last_log_id($data_to_update)
	{
	    $data_array = explode("<end_of_log>", $data_to_update);
	    $log_id = explode(".", end($data_array))[0];
	    return (int)$log_id;
	}
?>

