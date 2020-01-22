<?php
	include ("../time_out_session.php");
	if (!isset($_SESSION['user_id'])) {
		header("Location: ../login.php");
	}
?>

<div class="col">
	<h3 style="text-align: center;padding-bottom: 1%;">Αλλαγή Διαχειριστή</h3>
  <form class="form-horizontal" action="admin_employee_managment.php" id="form" method="post" enctype="multipart/form-data">
	  	<div class="form-row">
		    <div class="col-md-4 mb-3">
		      <label for="name">Επιλογή νέου διαχειριστή από χρήστες</label>
		      <select class="form-control" id="user_to_change_to_admin" name="user_to_change_to_admin">
		      	<?php 
		      		$sql = "SELECT * FROM govrn_emp ";
				    $res_data = mysqli_query($connection,$sql);

				    while($row = mysqli_fetch_array($res_data)){
				    	if ($row['admin'] == 0) {
				    		echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
				    	}
				    }
		      	?>
			  </select>
		    </div>				  
	  	</div>
	  	<div class="form-row">
		    <button type="submit" class="btn btn-danger" value="btnChange" id="btnChange" name="btnChange" >Αλλαγή</button>
	  	</div>
	</form>
</div>