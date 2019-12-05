<?php
session_start();
	if(isset($_POST['company_name']) && isset($_POST['company_address']) && isset($_POST['company_phone']) && 
		isset($_POST['company_taxId'])) {
		include ("connect.php");
		$fullname= "empty";
		$name_check= "(Ανώνυμη)";
	
		if (!empty($_POST['name'])) {
			$fname = mysqli_real_escape_string($connection,$_POST['name']);
		}
		if (!empty($_POST['surname'])) {
			$lname = mysqli_real_escape_string($connection,$_POST['surname']);
		}
		if (!empty($_POST['checkbox'])) {
			$name_check = mysqli_real_escape_string($connection,$_POST['checkbox']);
			if ($name_check == "Yes") {
				$name_check = "(Επώνυμη)";
			}
			else {
				$name_check = "(Ανώνυμη)";
			}
		}
		if ((!empty($_POST['name']) && !strlen(trim($_POST['name'])) == 0)|| ( !empty($_POST['surname']) && !strlen(trim($_POST['surname'])) == 0)){
			$fullname = $fname." ".$lname." ".$name_check;
		}
		else{
			$fullname = "empty";
		}
		if (!empty($_POST['email']) && !strlen(trim($_POST['email'])) == 0) {
			$email = mysqli_real_escape_string($connection,$_POST['email']);
		}
		else{
			$email = "empty";
		}
		if (!empty($_POST['phone']) && !strlen(trim($_POST['phone'])) == 0) {
			$phone = mysqli_real_escape_string($connection,$_POST['phone']);
		}
		else{
			$phone = "empty";
		}
		if (!empty($_POST['company_name']) && !strlen(trim($_POST['company_name'])) == 0) {
			$company_name = mysqli_real_escape_string($connection,$_POST['company_name']);
		}
		else{
			$company_name = "empty";
		}
		if (!empty($_POST['company_address']) && !strlen(trim($_POST['company_address'])) == 0) {
			$company_address = mysqli_real_escape_string($connection,$_POST['company_address']);
		}
		else{
			$company_address = "empty";
		}
		if (!empty($_POST['company_phone']) && !strlen(trim($_POST['company_phone'])) == 0) {
			$company_phone = mysqli_real_escape_string($connection,$_POST['company_phone']);
		}
		else{
			$company_phone = "empty";
		}
		if (!empty($_POST['company_taxId']) && !strlen(trim($_POST['company_taxId'])) == 0) {
			$company_taxId = mysqli_real_escape_string($connection,$_POST['company_taxId']);
		}
		else{
			$company_taxId = "empty";
		}
		
		
		if (isset($_POST['comment']) && !strlen(trim($_POST['comment'])) == 0) {
		    // Escape any html characters
		    $comment = htmlentities(mysqli_real_escape_string($connection,$_POST['comment']));
		}
		else{
			$comment = "empty";
		}
		
		

		include('upload.php');
	} 
	else {
		echo "Something went wrong";
	}


?>