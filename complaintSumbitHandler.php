<?php
if(isset($_POST['submit'])) {
	if(isset($_POST['company_name']) && isset($_POST['company_address']) && isset($_POST['company_phone']) && 
		isset($_POST['company_taxId'])) {
		include ("connect.php");
		echo $_POST['company_name'];
		;

		/*
		$fname = mysqli_real_escape_string($connect,$_POST['fname']);
		$lname = mysqli_real_escape_string($connect,$_POST['lname']);
		$email = mysqli_real_escape_string($connect,$_POST['email']);
		$subject = "Email_from_".$fname."_".$lname;
		$message = htmlentities(mysqli_real_escape_string($connect,$_POST['message']));
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			exit('email is not valid');
		}
		// write email sending code(PHPMailer or email())
		$email = mail('giannisklian@gmail.com', $subject, $message, "From:" . $email);
		*/

	} 
else {
echo "Something went wrong";
}
}
else{
	echo "not set";
}

?>