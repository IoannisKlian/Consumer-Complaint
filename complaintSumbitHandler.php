<?php
if(isset($_POST['submit'])) {
	if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['comment'])) {
		include ("connect.php");

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
	} 
else {
echo "Something went wrong";
}
}

?>