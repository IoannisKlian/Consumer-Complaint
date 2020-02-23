<?php
	session_start();
	if (!isset($_SESSION['user_id'])) {
		header("Location: ../login.php");
	}
	include ("../../connect.php");


	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		//Add new user in system
		if (isset($_POST['btnAdd'])) {
			$username = mysqli_real_escape_string($connection,$_POST['username']);
			$password = mysqli_real_escape_string($connection,$_POST['password']);
			$email = mysqli_real_escape_string($connection,$_POST['email']);
			$name = mysqli_real_escape_string($connection,$_POST['name']);
			mysqli_query($connection,"INSERT INTO govrn_emp VALUES ( DEFAULT,'".$username."','".$password."','".$email."','".$name."',0)");
			echo '<script type="text/javascript">','location.replace("./index.php?admin_id=0");','</script>';
		}

		//Delete user
		/*
		else if (isset($_POST['btnDel'])) {
			$selected_val = $_POST['user_to_delete'];
			mysqli_query($connection,"DELETE FROM employee_complaint WHERE employee_id =".$selected_val."");
			mysqli_query($connection,"DELETE FROM govrn_emp WHERE id =".$selected_val."");
			echo '<script type="text/javascript">','location.replace("./index.php?admin_id=1");','</script>';
		}
		*/

		//Returns the query containing information for the desired employee 
		else if (isset($_POST['btnGen'])) {

			$selected_val = $_POST['user_to_generate'];

			$result = mysqli_query($connection,"SELECT * FROM govrn_emp WHERE id = ".$selected_val."");
			
			$row = mysqli_fetch_array($result);
			header('Location:./index.php?admin_id=2&un="'.$row['username'].'"&selecval="'.$selected_val.'"&pw="'.$row['password'].'"&eml="'.$row['email'].'"&nm="'.$row['name'].'"');
		}
		
		//Updates the user information
		else if(isset($_POST['btnUpd'])){
			$selected_val = $_POST['user_to_generate'];
			$username = mysqli_real_escape_string($connection,$_POST['username_update']);
			$password = mysqli_real_escape_string($connection,$_POST['password_update']);
			$email = mysqli_real_escape_string($connection,$_POST['email_update']);
			$name = mysqli_real_escape_string($connection,$_POST['name_update']);
			mysqli_query($connection,'UPDATE govrn_emp SET username ="'.$username.'" , password ="'.$password.'" , email ="'.$email.'" , name ="'.$name.'"  WHERE id = '.$selected_val.'');
			echo '<script type="text/javascript">','location.replace("./index.php?admin_id=2");','</script>';
		}

		//Change Admin
		else if (isset($_POST['btnChange'])) {
			$selected_val = $_POST['user_to_change_to_admin'];
			mysqli_query($connection,'UPDATE govrn_emp SET admin ="1" WHERE id = '.$selected_val.'');
			mysqli_query($connection,'UPDATE govrn_emp SET admin ="0" WHERE id = '.$_SESSION['user_id'].'');
			header("Location: ../login.php");
		}
	}
	
?>	