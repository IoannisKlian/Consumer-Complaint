<?php  
	$connection = mysqli_connect("localhost", "root", "", "consumer_complaint");
	if (!$connection) {
		die('Could not connect: '. mysqli_error());
	}
?>