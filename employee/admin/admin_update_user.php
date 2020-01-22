<div class="col">
	<h3 style="text-align: center;padding-bottom: 1%;">Ανανέωση Στοιχείων Χρήστη</h3>
  <form class="form-horizontal" action="admin_employee_managment.php" id="form" method="post" enctype="multipart/form-data">
	  	<div class="form-row">
		    <div class="col-md-4 mb-3">
		      <label for="name">Επιλογή χρήστη για φόρτωση δεδομένων</label>
		      <select class="form-control" id="user_to_generate" name="user_to_generate">
		      	<?php 
		      		$sql = "SELECT * FROM govrn_emp ";
				    $res_data = mysqli_query($connection,$sql);
				   
				    while($row = mysqli_fetch_array($res_data)){
				    	if ($row['admin'] == 0 ) {
				    		if (isset($_GET['selecval'])&&!empty($_GET['selecval'])&&($row['id']==intval(trim($_GET['selecval'],'"')))) {
				    			echo '<option value="'.$row['id'].'" selected>'.$row['name'].'</option>';
				    		}
				    		else{
				    			echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
				    		}
				    	}
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