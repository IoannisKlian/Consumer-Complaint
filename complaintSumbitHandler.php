<?php
	if(isset($_POST['company_name']) && isset($_POST['company_address']) && isset($_POST['company_phone']) && 
		isset($_POST['company_taxId'])) {
		include ("connect.php");
		$fullname= "empty";
	
		if (!empty($_POST['name'])) {
			$fname = mysqli_real_escape_string($connection,$_POST['name']);
		}
		if (!empty($_POST['surname'])) {
			$lname = mysqli_real_escape_string($connection,$_POST['surname']);
		}
		if (!empty($_POST['name']) && !empty($_POST['surname'])){
			$fullname = $fname." ".$lname;
		}
		if (!empty($_POST['email'])) {
			$email = mysqli_real_escape_string($connection,$_POST['email']);
		}
		else{
			$email = "empty";
		}
		if (!empty($_POST['phone'])) {
			$phone = mysqli_real_escape_string($connection,$_POST['phone']);
		}
		else{
			$phone = "empty";
		}
		if (!empty($_POST['company_name'])) {
			$company_name = mysqli_real_escape_string($connection,$_POST['company_name']);
		}
		else{
			$company_name = "empty";
		}
		if (!empty($_POST['company_address'])) {
			$company_address = mysqli_real_escape_string($connection,$_POST['company_address']);
		}
		else{
			$company_address = "empty";
		}
		if (!empty($_POST['company_phone'])) {
			$company_phone = mysqli_real_escape_string($connection,$_POST['company_phone']);
		}
		else{
			$company_phone = "empty";
		}
		if (!empty($_POST['company_taxId'])) {
			$company_taxId = mysqli_real_escape_string($connection,$_POST['company_taxId']);
		}
		else{
			$company_taxId = "empty";
		}
		
		
		if (isset($_POST['comment'])) {
		    // Escape any html characters
		    $comment = htmlentities(mysqli_real_escape_string($connection,$_POST['comment']));
		}
		else{
			$comment = "empty";
		}
		
		mysqli_query($connection,"INSERT INTO complaint VALUES ( DEFAULT ,'".$fullname."' ,'".$email."','".$phone."','".$company_name."','".$company_address."','".$company_phone."','".$company_taxId."','".$comment."',now() ,0)");
		$complaint_id = mysqli_insert_id($connection);

		include('upload.php');
	} 
	else {
	echo "Something went wrong";
	}


?>