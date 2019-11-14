<?php
	session_start();
	if (!isset($_SESSION['id'])) {
		//header("Location: login.php");
	}
	else{
		$userID=$_SESSION['"id"'];
		$complaintID = $_POST['complaintID'];
	}

	$complaintID = $_POST['complaintID'];
	$_SESSION['complaintID'] = $complaintID;
	include ("connect.php");

	echo '<script type="text/javascript">','location.replace("employee/complaint_box.php");','</script>';

	/*mysqli_query($connection,"INSERT INTO `employee_complaint` (`id`, `employee_id`, `complaint_id`, `datetime`) VALUES (DEFAULT,'".$userID."', '".$complaintID."', now())");
	*/

?>