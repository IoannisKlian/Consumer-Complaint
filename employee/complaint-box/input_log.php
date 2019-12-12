<?php
session_start();
include ("../../connect.php");

if (isset($_POST['comment']) && !strlen(trim($_POST['comment'])) == 0) {

	$comment = htmlentities(mysqli_real_escape_string($connection,$_POST['comment']));
	$complaintID = $_SESSION['complaintID'];

    date_default_timezone_set('Europe/Athens');

    mysqli_query($connection,"INSERT INTO log (`description`, `datetime`, `complaint_id`) 
                                VALUES ('".$comment."','".date('Y-m-d H:i:s')."','".$complaintID."')");

    echo '<script type="text/javascript">','location.replace("log.php");','</script>';
}

?>