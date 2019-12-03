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

	

	mysqli_query($connection,"INSERT INTO employee_complaint VALUES ( '".$userID."', '".$complaintID."', now())");

	$sql = "SELECT * FROM complaint_log WHERE complaint_id = ".$complaintID." ";
    $res_data = mysqli_query($connection,$sql);
    $data_to_update ="";

    while($row = mysqli_fetch_array($res_data)){

    	$data_to_update = $row['log'];
    }
    date_default_timezone_set('Europe/Athens');
		
    $data_to_update.= "\n&#x25C8 2. Έγινε ανάληψη από ".$_SESSION["name"]." - ".date('Y-m-d H:i:s');
    mysqli_query($connection,'UPDATE complaint_log SET log = "'.$data_to_update.'" WHERE complaint_id ="'.$complaintID.'"');

	mysqli_query($connection,'UPDATE complaint SET status = 1 WHERE id ="'.$complaintID.'"');


	echo '<script type="text/javascript">','location.replace("employee_index.php");','</script>';

	
	

?>
