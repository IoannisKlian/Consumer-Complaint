<?php 
	include ("connect.php");

	$result = mysqli_query($connection, "SELECT * FROM complaint WHERE id = '".$_SESSION['complaintID']."'");
	$row = mysqli_fetch_array($result);


		if (!(strcmp($row['name'],"empty")==0)){
			$fullname = $row['name'];
		}
		else{
			$fullname = "-";
		}
		
		if (!(strcmp($row['email'],"empty")==0)) {
			$email = $row['email'];
		}
		else{
			$email = "-";
		}
		if (!(strcmp($row['phonenumber'],"empty")==0)) {
			$phone = $row['phonenumber'];
		}
		else{
			$phone = "-";
		}
		if ($row[]) {
			$company_name = mysqli_real_escape_string($connection,$_POST['company_name']);
		}
		else{
			$company_name = "-";
		}
		if ($row[]) {
			$company_address = mysqli_real_escape_string($connection,$_POST['company_address']);
		}
		else{
			$company_address = "-";
		}
		if ($row[]) {
			$company_phone = mysqli_real_escape_string($connection,$_POST['company_phone']);
		}
		else{
			$company_phone = "-";
		}
		if ($row[]) {
			$company_taxId = mysqli_real_escape_string($connection,$_POST['company_taxId']);
		}
		else{
			$company_taxId = "-";
		}
		
		
		if ($row[]) {
		    // Escape any html characters
		    $comment = htmlentities(mysqli_real_escape_string($connection,$_POST['comment']));
		}
		else{
			$comment = "Χωρίς περιγραφή!";
		}

?>