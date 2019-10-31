
<?php

include ("connect.php");

$errorMessage = "";



$targetDir = "uploads/";
if(!is_dir($targetDir)){
	$oldmask = umask(0);
    mkdir($targetDir, 0777, true);
    umask($oldmask);
}
$fileName = $complaint_id.basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);



if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {

	//We define the acceptable file types in an array
    $allowTypes = array('jpg','png','jpeg','pdf');
    if(in_array($fileType, $allowTypes)){
    	if (!file_exists($targetFilePath)) {
	    	//The 8000000 is equal to 8mb
		    if ($_FILES["file"]["size"] < 8000000) {

		        if(move_uploaded_file($_FILES["file"]["tmp_name"],$targetFilePath )){
		        	mysqli_query($connection,"INSERT INTO file (id, name, complaint_id) 
	VALUES (DEFAULT, '".$fileName."', '".$complaint_id."')");
		        	
		            header("Location: index.php");
		        }
		        else{
		            $errorMessage =  "Something went wrong";
		            $_SESSION['errorupload'] = true;
		        }
		    }
		    else{
		    	$errorMessage =  "File is greater than 5mb!";
		    	$_SESSION['errorupload'] = true;
		    }
		}
		else{
			$errorMessage =  "File already exists";
			$_SESSION['errorupload'] = true;
		}
    }
    else{
        $errorMessage =  'Your file type is not an image or pdf file!';
        $_SESSION['errorupload'] = true;
    }
}
else{
    $errorMessage =  'Please select a file to upload.';
    $_SESSION['errorupload'] = true;
}


$_SESSION['erroruploadmessage'] = $errorMessage;
header("Location: index.php");


?>