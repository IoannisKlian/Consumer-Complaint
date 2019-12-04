<?php 
  session_start();
  include ("time_out_session.php");
  if (!isset($_SESSION['user']) || $_SESSION['user'] == false || $_SESSION['id'] != 1) {
     header("Location: login.php");
  }
  include ("../connect.php");
?>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	  <meta charset="utf-8" />
</head>
<body>
	<div class="container">
		<div class="row" style="padding-top: 2%;">
		    <div class="col">
		    	<h3 style="text-align: center;padding-bottom: 1%;">Προσθήκη χρήστη</h3>
		    	<form class="form-horizontal" action="admin_employee_managment.php" id="form" method="post" enctype="multipart/form-data">
				  	<div class="form-row">
					    <div class="col-md-4 mb-3">
					      <label for="name">Όνομα χρήστη</label>
					      <input type="text" class="form-control" id="username" placeholder="Όνομα χρήστη" name="username" required>
					    </div>				  
					    <div class="col-md-4 mb-3">
					      <label for="surname">Κωδικός χρήστη</label>
					      <input type="text" class="form-control" id="password" placeholder="Κωδικός χρήστη" name="password" required>
					    </div>
				  	</div>
				  	<div class="form-row">
					    <div class="col-md-4 mb-3">
					      <label for="name">E-mail</label>
					      <input type="email" class="form-control" id="email" placeholder="E-mail" name="email" required>
					    </div>				  
					    <div class="col-md-4 mb-3">
					      <label for="surname">Όνομα και Επώνυμο</label>
					      <input type="text" class="form-control" id="name" placeholder="Όνομα και Επώνυμο" name="name" required>
					    </div>
				  	</div>
				  	<div class="form-row">
					    <button type="submit" class="btn btn-primary" value="btnAdd" id="btnAdd" name="btnAdd" >Προσθήκη</button>
				  	</div>
				</form>
				
		    </div>
		</div>
		<hr>
		<div class="row" style="padding-top: 3%;padding-bottom: 3%;">
		    <div class="col">
		    	<h3 style="text-align: center;padding-bottom: 1%;">Διαγραφή χρήστη</h3>
		      <form class="form-horizontal" action="admin_employee_managment.php" id="form" method="post" enctype="multipart/form-data">
				  	<div class="form-row">
					    <div class="col-md-4 mb-3">
					      <label for="name">Επιλογή χρήστη για διαγραφή</label>
					      <select class="form-control" id="user_to_delete" name="user_to_delete">
					      	<?php 
					      		$sql = "SELECT * FROM govrn_emp ";
							    $res_data = mysqli_query($connection,$sql);
							    //This is used in order admin which is first user cannot be deleted
							    $counter = 0;
							    while($row = mysqli_fetch_array($res_data)){
							    	if ($counter != 0 ) {
							    		echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
							    	}
							    	$counter++;
							    }
					      	?>
						  </select>
					    </div>				  
				  	</div>
				  	<div class="form-row">
					    <button type="submit" class="btn btn-danger" value="btnDel" id="btnDel" name="btnDel" >Διαγραφή</button>
				  	</div>
				</form>
		    </div>
		</div>
		<hr>
		<div class="row" style="padding-top: 3%;padding-bottom: 3%;">
		    <div class="col">
		    	<h3 style="text-align: center;padding-bottom: 1%;">Ανανέωση χρήστη</h3>
		      <form class="form-horizontal" action="admin_employee_managment.php" id="form" method="post" enctype="multipart/form-data">
				  	<div class="form-row">
					    <div class="col-md-4 mb-3">
					      <label for="name">Επιλογή χρήστη για φόρτωση δεδομένων</label>
					      <select class="form-control" id="user_to_generate" name="user_to_generate">
					      	<?php 
					      		$sql = "SELECT * FROM govrn_emp ";
							    $res_data = mysqli_query($connection,$sql);
							    //This is used in order admin which is first user cannot be deleted
							    $counter = 0;
							   
							    while($row = mysqli_fetch_array($res_data)){
							    	if ($counter != 0 ) {
							    		if (isset($_GET['selecval'])&&!empty($_GET['selecval'])&&($row['id']==intval(trim($_GET['selecval'],'"')))) {
							    			echo '<option value="'.$row['id'].'" selected>'.$row['name'].'</option>';
							    		}
							    		else{
							    			echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
							    		}
							    	}
							    	$counter++;
							    }
					      	?>
						  </select>
					    </div>
					    <div class="col-md-4 mb-3" style="padding-top: 2.70%;">
					    	<button type="submit" class="btn btn-success" value="btnGen" id="btnGen" name="btnGen" >Φόρτωση δεδομένων χρήστη</button>
					    </div>
				  	</div>
				  	<div class="form-row">
					    <div class="col-md-4 mb-3">
					      <label for="name">Όνομα χρήστη</label>
					      <input type="text" class="form-control"<?php if(isset($_GET['un'])&&!empty($_GET['un'])){echo 'value='.$_GET['un'];unset($_GET['un']);}?> id="username_update" placeholder="Όνομα χρήστη" name="username_update" >
					    </div>				  
					    <div class="col-md-4 mb-3">
					      <label for="surname">Κωδικός χρήστη</label>
					      <input type="text" class="form-control"<?php if(isset($_GET['pw'])&&!empty($_GET['pw'])){echo 'value='.$_GET['pw'];unset($_GET['pw']);}?> id="password_update" placeholder="Κωδικός χρήστη" name="password_update" >
					    </div>
				  	</div>
				  	<div class="form-row">
					    <div class="col-md-4 mb-3">
					      <label for="name">E-mail</label>
					      <input type="email" class="form-control"<?php if(isset($_GET['eml'])&&!empty($_GET['eml'])){echo 'value='.$_GET['eml'];unset($_GET['eml']);}?> id="email_update" placeholder="E-mail" name="email_update" >
					    </div>				  
					    <div class="col-md-4 mb-3">
					      <label for="surname">Όνομα και Επώνυμο</label>
					      <input type="text" class="form-control"<?php if(isset($_GET['nm'])&&!empty($_GET['nm'])){echo 'value='.$_GET['nm'];unset($_GET['nm']);}?> id="name_update" placeholder="Όνομα και Επώνυμο" name="name_update" >
					    </div>
				  	</div>
				  	<div class="form-row">
					    <button type="submit" class="btn btn-danger" value="btnUpd" id="btnUpd" name="btnUpd" >Ανανέωση</button>
				  	</div>
				</form>
		    </div>
		</div>
		
	</div>

</body>
</html>