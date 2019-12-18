<?php
	include ("../time_out_session.php");
	if (!isset($_SESSION['user_id'])) {
		header("Location: ../login.php");
	}
?>

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