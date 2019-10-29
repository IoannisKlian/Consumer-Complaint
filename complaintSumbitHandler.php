<?php
if(isset($_POST['submit'])) {
	if(isset($_POST['company_name']) && isset($_POST['company_address']) && isset($_POST['company_phone']) && 
		isset($_POST['company_taxId'])) {
		include ("connect.php");
	
		if (!empty($_POST['name'])) {
			$fname = mysqli_real_escape_string($connection,$_POST['name']);
		}
		if (!empty($_POST['surname'])) {
			$lname = mysqli_real_escape_string($connection,$_POST['surname']);
		}
		if (!empty($_POST['adress'])) {
			$adress = mysqli_real_escape_string($connection,$_POST['adress']);
		}
		if (!empty($_POST['email'])) {
			$email = mysqli_real_escape_string($connection,$_POST['email']);
		}
		if (!empty($_POST['phone'])) {
			$phone = mysqli_real_escape_string($connection,$_POST['phone']);
		}
		$company_name = mysqli_real_escape_string($connection,$_POST['company_name']);
		$company_address = mysqli_real_escape_string($connection,$_POST['company_address']);
		$company_phone = mysqli_real_escape_string($connection,$_POST['company_phone']);
		$company_taxId = mysqli_real_escape_string($connection,$_POST['company_taxId']);
		$comment = $_POST['phone'];
		if (!empty($_POST['nomoi_elladas'])) {
			$nomoi_elladas = mysqli_real_escape_string($connection,$_POST['nomoi_elladas']);
		}
	} 
	else {
	echo "Something went wrong";
	}
}


?>