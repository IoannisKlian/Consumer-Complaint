<?php 
  session_start();
  include ("time_out_session.php");
  include ("../connect.php");
?>

<?php
    
  // Get company name and category
  include("../connect.php");
  $company_name_query = "SELECT company_name, status FROM complaint WHERE id = '".$_SESSION['complaintID']."'";
  $result = mysqli_query($connection,$company_name_query);
  $complaint_navigation = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/complaintBox.js"></script>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

  <?php

  	// Navigation Bar
    include("employee_nav.php");

    // Complaint Path and tabs
    include("complaint_box_navigation.php");
  ?>
<div style="margin: 10px;">
	<div class="row" style="width: 100%;">
			<div class="col-sm-8">

				<textarea disabled="true" style="resize: none; width: 100%;" rows=20; id="none" name="none" placeholder="" >
					<?php
						$complaintID = $_SESSION['complaintID'];
					 	$sql = "SELECT * FROM complaint_log WHERE complaint_id = ".$complaintID." ";
					    $res_data = mysqli_query($connection,$sql);
					    $data_to_show ="";

					    while($row = mysqli_fetch_array($res_data)){

					    	$data_to_show = $row['log'];
					    }
					    
					    echo $data_to_show;
					?>
				</textarea>

			</div>
			<div class="col-sm-4" style=" padding: 0; margin: 0;">
				<form action="input_log.php" id="form" method="post" enctype="multipart/form-data" style="position:absolute; bottom: 0; width: 100%;">
				<textarea style="resize: none;" wrap="physical" rows="5" class="form-control" id="comment" name="comment" ></textarea>
				<button type="submit" class="btn btn-secondary" value="Submit" id="submit-btn" >Προσθήκη</button>
				</form>
	
			</div>
		</div>
</div>
</body>
</html>