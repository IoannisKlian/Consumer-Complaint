<?php 
  session_start();
  include ("../time_out_session.php");
  include ("../../connect.php");
?>

<?php
    
  // Get category
  $status_query = "SELECT status FROM complaint WHERE id = '".$_SESSION['complaintID']."'";
  $result = mysqli_query($connection,$status_query);
  $status = mysqli_fetch_array($result)[0];
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	    <meta charset="utf-8" />
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <style type="text/css">
	    	html , body{height: 100%;}
	    	body{background-color: #f7f7f7;}
	    	tr:nth-child(even){background-color: #f2f2f2;}
	    	th{padding-bottom: 15px; padding-top: 15px;}
	    	table{width: 100%;}
	    	#cont{display: flex; flex-flow: column; height: 95%; z-index: 10; position: relative; }
	    	#nav-container{flex: 0 1 auto;}
	    	#main-log{overflow-x: hidden;flex: 1 1 auto;}
	    	#log-list{padding-right: 0; margin-right: 0; height: 100%; overflow:auto; border-right: solid #B0F2F1 1px; border-bottom: solid #B0F2F1 1px; background-color: white;}
	    </style>
	</head>
	<body>
		<div id="cont">
			<div id="nav-container">
				<?php

				  	// Navigation Bar
				    include("../employee_nav.php");

				    // Complaint Path and tabs
					include("complaint_box_navigation.php");
				?>
			</div>
			<div id="main-log" style=" ">
				<div class="row" style="height: 100%;">
					<div class="col-sm-8" id="log-list" style=" ">
						<table>
						<?php
								$complaintID = $_SESSION['complaintID'];
							 	$sql = "SELECT * FROM complaint_log WHERE complaint_id = ".$complaintID." ";
							    $res_data = mysqli_query($connection,$sql);
							    $data_to_show ="";

							    while($row = mysqli_fetch_array($res_data)){

							    	$data_to_show = $row['log'];
							    }

							    $array_to_show = explode("<end_of_log>", $data_to_show);

							    foreach ($array_to_show as $log) {
							    	
							    	$log_parts = get_log_parts($log);?>
							    	
							    	<tr style="border-bottom: 1px solid #f7f7f7; font-family: 'Times New Roman'">
				
							    		<th style="width: 5%;"><?php echo $log_parts[0];?></th>
							    		<th style="width: 75%;"><?php echo $log_parts[1];?></th>
							    		<th style="width: 20%;"><?php echo $log_parts[2];?></th>

							    	</tr>

							    	<?php
							    }
						?>
						</table>
					</div>

					<!-- Log Text Box -->
					<?php

						// If complaint is closed, text box will not appear.
						if ($status != 2) {
							?> 
								<div class="col-sm-4" style="height: 100%; padding: 0; margin: 0; height:100%;">
									<form action="input_log.php" id="form" method="post" enctype="multipart/form-data" style="position:absolute; bottom: 0; width: 100%;">
									<textarea style="resize: none;" wrap="physical" rows="5" class="form-control" id="comment" name="comment" style="" ></textarea>
									<button type="submit" class="btn btn-secondary" value="Submit" id="submit-btn" style="height: 15%;">Προσθήκη</button>
									</form>
						
								</div>

							<?php
						}

					?>

				</div>
			</div>
		</div>
	</body>
</html>

<?php

	function get_log_parts ($log)
	{
		$part[0] = explode("<log_id>", $log)[0];
		$part[1] = explode("<date_of_log>", explode("<log_id>", $log)[1])[0]; 
		$part[2] = explode("<date_of_log>", $log)[1];
		return $part;
	}

?>

