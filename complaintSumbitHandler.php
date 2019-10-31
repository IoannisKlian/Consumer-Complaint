<?php
if(isset($_POST['submit'])) {
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
		if (!empty($_POST['adress'])) {
			$adress = mysqli_real_escape_string($connection,$_POST['adress']);
		}
		else{
			$adress = "empty";
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
		$company_name = mysqli_real_escape_string($connection,$_POST['company_name']);
		$company_address = mysqli_real_escape_string($connection,$_POST['company_address']);
		$company_phone = mysqli_real_escape_string($connection,$_POST['company_phone']);
		$company_taxId = mysqli_real_escape_string($connection,$_POST['company_taxId']);
		if (isset($_POST['comment'])) {
		    // Escape any html characters
		    $comment = htmlentities(mysqli_real_escape_string($connection,$_POST['comment']));
		}
		else{
			$comment = "empty";
		}
		
		if (!empty($_POST['nomoi_elladas'])) {
			$nomoi_elladas = mysqli_real_escape_string($connection,$_POST['nomoi_elladas']);
		}

		//$filename =  $_FILES['fileToUpload']['name'];
		//echo $filename;

		mysqli_query($connection,"INSERT INTO complaint VALUES ( DEFAULT ,'".$fullname."' ,'".$email."','".$phone."','".$company_name."','".$company_address."','".$company_phone."','".$company_taxId."','filename','".$nomoi_elladas."','".$comment."')");
	} 
	else {
	echo "Something went wrong";
	}
}


?>