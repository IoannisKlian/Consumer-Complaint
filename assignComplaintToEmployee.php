<?php
	session_start();
	if (!isset($_SESSION['"id"']) && !isset($_SESSION['complaintID'])) {
		header("Location: login.php");
	}
	else{
		$userID=$_SESSION['"id"'];
		$complaintID = $_SESSION['complaintID'];
	}
	echo $complaintID;

	/*include ("connect.php");

	mysqli_query($connection,"INSERT INTO `employee_complaint` (`id`, `employee_id`, `complaint_id`, `datetime`) VALUES (DEFAULT,'".$userID."', '".$complaintID."', now())");

*/

?>