<?php 
	include ("../connect.php");

	$result = mysqli_query($connection, "SELECT * FROM complaint WHERE id = '".$_SESSION['complaintID']."'");
	$row = mysqli_fetch_array($result);


		if (!(strcmp($row['complainant_name'],"empty")==0)){
			$fullname = $row['complainant_name'];
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
		if (!(strcmp($row['company_name'],"empty")==0)) {
			$company_name = $row['company_name'];
		}
		else{
			$company_name = "-";
		}
		if (!(strcmp($row['company_adress'],"empty")==0)) {
			$company_address = $row['company_adress'];
		}
		else{
			$company_address = "-";
		}
		if (!(strcmp($row['company_phone'],"empty")==0)) {
			$company_phone = $row['company_phone'];
		}
		else{
			$company_phone = "-";
		}
		if (!(strcmp($row['company_taxid'],"empty")==0)) {
			$company_taxId =  $row['company_taxid'];
		}
		else{
			$company_taxId = "-";
		}
		
		
		if (!(strcmp($row['description'],"empty")==0)) {
		    // Escape any html characters
		    $comment = $row['description'];
		}
		else{
			$comment = "Χωρίς περιγραφή!";
		}

		$date_added = $row['subdate'];

?>