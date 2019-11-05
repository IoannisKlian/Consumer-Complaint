<?php  
	$connection = mysqli_connect("localhost", "root", "", "consumer_complaint");
	mysqli_set_charset($connection, "utf8");
	if (!$connection) {
		die('Could not connect: '. mysqli_error());
	}
?>