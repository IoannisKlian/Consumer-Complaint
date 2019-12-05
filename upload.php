
<?php

include ("connect.php");

$errorMessage = "";
$result = mysqli_query($connection, "SELECT * FROM complaint ORDER BY ID DESC LIMIT 1");
$row = mysqli_fetch_array($result);

$complaint_id = $row['id']+1;


$targetDir = "uploads/";
if(!is_dir($targetDir)){
	$oldmask = umask(0);
    mkdir($targetDir, 0777, true);
    umask($oldmask);
}
$fileName = $complaint_id.basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if (strcmp($email, "empty")==0) {
	$emailExist = false;
}
else{
	$emailExist = true;
}

if(!empty($_FILES["file"]["name"])) {
	//We define the acceptable file types in an array
    $allowTypes = array('jpg','png','PNG', 'jpeg','pdf');
    if(in_array($fileType, $allowTypes)){
    	if (!file_exists($targetFilePath)) {
	    	//The 8000000 is equal to 8mb
		    if ($_FILES["file"]["size"] < 8000000) {

		        if(move_uploaded_file($_FILES["file"]["tmp_name"],$targetFilePath )){
		        	mysqli_query($connection,"INSERT INTO complaint VALUES ( DEFAULT ,'".$fullname."' ,'".$email."','".$phone."','".$company_name."','".$company_address."','".$company_phone."','".$company_taxId."','".$comment."',now() ,0)");
					$complaint_id = mysqli_insert_id($connection);
					date_default_timezone_set('Europe/Athens');


					$log = "1. <log_id> Καταχώρηση καταγγελίας <date_of_log> - ".date('Y-m-d H:i:s');

					mysqli_query($connection,"INSERT INTO complaint_log VALUES ( '".$complaint_id."','".$log."')");
		        	mysqli_query($connection,"INSERT INTO file (id, name, complaint_id) 
												VALUES (DEFAULT, '".$fileName."', '".$complaint_id."')");
		        	include ("employee/email_notification.php");
		        	echo '<script type="text/javascript">','location.replace("successFormFilling.php?cid='.$complaint_id.'&em='.$emailExist.'");','</script>';
		        }
		        else{
		            $errorMessage =  "Κάτι πήγε στραβά!";
		            $_SESSION['errorupload'] = true;
		        }
		    }
		    else{
		    	$errorMessage =  "Το αρχείο είναι μεγαλύτερο από 8mb!";
		    	$_SESSION['errorupload'] = true;
		    }
		}
		else{
			$errorMessage =  "To arxeio yparxei idi!";
			$_SESSION['errorupload'] = true;
		}
    }
    else{
        $errorMessage =  'Ο τύπος αρχείου δεν είναι PDF ή Φωτογραφία(jpg,png,jpeg)';
        $_SESSION['errorupload'] = true;
    }
}
else{
	mysqli_query($connection,"INSERT INTO complaint VALUES ( DEFAULT ,'".$fullname."' ,'".$email."','".$phone."','".$company_name."','".$company_address."','".$company_phone."','".$company_taxId."','".$comment."',now() ,0)");
		$complaint_id = mysqli_insert_id($connection);
		date_default_timezone_set('Europe/Athens');
		$log = "1. <log_id> Καταχώρηση καταγγελίας <date_of_log> - ".date('Y-m-d H:i:s');
		mysqli_query($connection,"INSERT INTO complaint_log VALUES ( '".$complaint_id."','".$log."')");
		include ("employee/email_notification.php");
		echo '<script type="text/javascript">','location.replace("successFormFilling.php?cid='.$complaint_id.'&em='.$emailExist.'");','</script>';
}

if (!(strcmp($errorMessage, "") == 0)) {
	$_SESSION['erroruploadmessage'] = $errorMessage;
	echo '<script type="text/javascript">','location.replace("failedformfilling.php");','</script>';
	echo '<button onclick="window.history.back()">fefef</button>';
}



?>