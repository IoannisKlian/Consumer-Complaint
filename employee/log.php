<?php 
  session_start();
  include ("time_out_session.php");
  include ("../connect.php");
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

	<div class="container" align="center">
		<div class="row">
			<div class="col-sm-9">

				<textarea disabled="true" style="resize: none;" rows="20" cols="100"  id="none" name="none" placeholder="" >
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
			<div class="col-sm-3">
				<form action="input_log.php" id="form" method="post" enctype="multipart/form-data">
				<textarea style="resize: none;" rows="4" cols="4" class="form-control" id="comment" name="comment" placeholder="Δώστε πληροφορίες σχετικά με το πρόβλημα που αντιμετωπίζεται" >
					
				</textarea>
				<button type="submit" class="btn btn-secondary" value="Submit" id="submit-btn" >Προσθήκη</button>
				</form>
	
			</div>
		</div>
	</div>

</body>
</html>