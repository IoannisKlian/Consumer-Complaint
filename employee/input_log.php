<?php
session_start();
include ("../connect.php");

if (isset($_POST['comment']) && !strlen(trim($_POST['comment'])) == 0) {

	$comment = htmlentities(mysqli_real_escape_string($connection,$_POST['comment']));
	$complaintID = $_SESSION['complaintID'];

	$sql = "SELECT * FROM complaint_log WHERE complaint_id = ".$complaintID." ";
    $res_data = mysqli_query($connection,$sql);
    $data_to_update ="";

    while($row = mysqli_fetch_array($res_data)){

    	$data_to_update = $row['log'];
    }
    date_default_timezone_set('Europe/Athens');

    $data_to_update.= "\n".$comment." - ".date('Y-m-d H:i:s');
    mysqli_query($connection,'UPDATE complaint_log SET log = "'.$data_to_update.'" WHERE complaint_id ="'.$complaintID.'"');
    echo '<script type="text/javascript">','location.replace("log.php");','</script>';
}

?>