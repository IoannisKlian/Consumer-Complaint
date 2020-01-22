<?php
	include ("../time_out_session.php");
	if (!isset($_SESSION['user_id'])) {
		header("Location: ../login.php");
	}
?>

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
				    	if ($_SESSION['admin'] == 0 ) {
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