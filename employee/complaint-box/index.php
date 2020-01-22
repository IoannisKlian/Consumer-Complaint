<?php 
  session_start();
  include ("../time_out_session.php");
  if (!isset($_SESSION['user']) || $_SESSION['user'] == false) {
     header("Location: ../login.php");
  }

  if (isset($_POST["complaintID"])) {
    $_SESSION['complaintID'] = $_POST["complaintID"];
    $complaintID = $_SESSION['complaintID'];
  }
  else{
    $complaintID = $_SESSION['complaintID'];
  }

  if (isset($_POST["session_ID"])) {
    $_SESSION['user_id'] = $_POST["session_ID"];
  }

  include("complaint_information.php");
?>

<!-- Main HTML -->
<HTML>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	  <meta charset="utf-8" />

	</head>
	<body>

	  <?php

	  	// Navigation Bar
	    include("../employee_nav.php");

	    // Complaint Path and tabs
	    include("complaint_box_navigation.php");
	  ?>

	  <!-- Complaint Info -->
	  <div class="accordion" id="accordionExample" style="z-index: 5">
	  	<?php include("complaint_info.php"); ?>
	  </div>

	  <!-- Date Submitted -->
	  <div class="card">
	    <div class="card-header" id="headingTwo">
	      <h6 class="mb-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "Ημερομηνία καταβολής: ".$date_added; ?></h6>
	    </div>
	  </div>

	  <!-- Description Box -->
	  <div class="card-body">
	    <div class="row">
	      <div class="col-sm-12">
	        <div class="card">
	            <div class="card-body">
	                <h5 class="card-title">Περιγραφή προβλήματος</h5>
	                <p class="card-text"> <?php echo $comment; ?></p>
	              </div>
	            </div>
	          </div>
	        </div>
	    </div>

	    <!-- File box -->
	    <div class="card-body">
		    <div class="row">
		      	<div class="col-sm-12">
		        	<div class="card">
		            	<div class="card-body">
			                <h5 class="card-title">Αποδεικτικά στοιχεία</h5>
			                <?php 
		                		$query = 'SELECT * FROM file 
		                      WHERE complaint_id = '.$complaintID;
		                      $result_of_query = mysqli_query($connection,$query);
		                      $file = mysqli_fetch_array($result_of_query);
		                      $total_rows = mysqli_fetch_array($result_of_query)[0];
		                      if (mysqli_num_rows($result_of_query)==0) {
		                        echo '<p class="card-text"> Δεν υπάρχει συνημμένο αρχείο!</p>';
		                      }
		                      else{
		                        echo '<p class="card-text">
		                        		<a target="_blank" href="../../uploads/'.$file['name'].'">
		                        			<img src="../../uploads/'.$file['name'].'" alt="'.$file['name'].'" style="width:200px;height:200px;">
				                        </a>
				                      </p>';
		                      }
		               		?>
		              	</div>
		            </div>
		        </div>
	        </div>
	    </div>
	    <br>


	    <!-- Assign and Close Buttons -->
		<div class="card-body">
		    <div class="row">
		      <div class="col-sm-4">
		    <?php
		      if(isset($_SESSION['user_id'])){

			      //This checks whether the complaint has been assigned to someone or not
			      $total_pages_sql = "SELECT COUNT(*) FROM complaint WHERE status = 1 AND id = '".$complaintID."'";
			      $result = mysqli_query($connection,$total_pages_sql);
			      $total_rows = mysqli_fetch_array($result)[0];

			      if ($total_rows == 0) {

			      		//This checks whether the complaint has closed
					    $total_pages_sql_of_closed_complaints = "SELECT COUNT(*) FROM complaint WHERE status = 2 AND id = '".$complaintID."'";
					    $result = mysqli_query($connection,$total_pages_sql_of_closed_complaints);
					    $total_rows_of_closed_complaints = mysqli_fetch_array($result)[0];
					    if ($total_rows_of_closed_complaints == 0) {
					    	echo '
						         <form action="assign_complaint_to_employee.php" method="post">
						          <input type="submit" name="Ανάληψη καταγγελίας" value="Ανάληψη καταγγελίας" class="btn btn-secondary" />
						          <input type="hidden" id="session_ID" name="session_ID" value="'.$_SESSION['user_id'].'">
						        </form>
						              ';
					    }
			       } 
			       else{
			        $query = "SELECT govrn_emp.name ,employee_complaint.datetime 
			                      FROM employee_complaint,complaint,govrn_emp 
			                      WHERE employee_complaint.employee_id = govrn_emp.id 
			                      AND ".$complaintID." = employee_complaint.complaint_id";
			        $result_of_query = mysqli_query($connection,$query);
			        $row_employee = mysqli_fetch_array($result_of_query);
			        
			        echo '
			          <form action="" method="">
			            <input type="submit" name="Ανάληψη καταγγελίας" value="Ανάληψη καταγγελίας" class="btn btn-secondary" disabled/> 
			          </form>
			              ';

			      ?>
			    </div>


			      <div class="col-sm-4">
			      <?php        
			         echo "Η καταγγελία έχει αναληφθεί απο ".$row_employee['name']." στις ".$row_employee['datetime'];   
			       }
			       ?>

			        </div>

			        <div class="col-sm-4" style="text-align: right;">
			        <?php

			       // Enable/Disable "Close Case" Button depending on the employee's ID.
			       $query_close_button = "SELECT * FROM `employee_complaint` WHERE `employee_id` = '".$_SESSION['user_id']."' AND `complaint_id` = '".$complaintID."'"; 
			        $result = mysqli_query($connection,$query_close_button);
			        $total= mysqli_fetch_array($result)[0];

			        if ($total == 0) {

			        	//This checks whether the complaint has closed for an employee that has not assigned this complaint
					    $total_pages_sql = "SELECT COUNT(*) FROM complaint WHERE status = 2 AND id = '".$complaintID."'";
					    $result = mysqli_query($connection,$total_pages_sql);
					    $total_rows = mysqli_fetch_array($result)[0];
					    if ($total_rows != 0) {
					    	$query = "SELECT govrn_emp.name ,employee_complaint.datetime 
			                      FROM employee_complaint,complaint,govrn_emp 
			                      WHERE employee_complaint.employee_id = govrn_emp.id 
			                      AND ".$complaintID." = employee_complaint.complaint_id";
			        		$result_of_query = mysqli_query($connection,$query);
			        		$row_employee = mysqli_fetch_array($result_of_query);
					    	echo "Η καταγγελία έχει αρχειοθετηθεί απο ".$row_employee['name'];
					    }
				        	
			        }
			        else {

			        	//This checks whether the complaint has closed
					    $total_pages_sql = "SELECT COUNT(*) FROM complaint WHERE status = 2 AND id = '".$complaintID."'";
					    $result = mysqli_query($connection,$total_pages_sql);
					    $total_rows = mysqli_fetch_array($result)[0];
					    if ($total_rows == 0) {
						      	echo '
					          <form action="complaint_close.php" method="post">
					            <input type="submit" name="Ανάληψη καταγγελίας" value="Κλείσιμο καταγγελίας" class="btn btn-secondary">
					            <input type="hidden" id="session_ID" name="session_ID" value="'.$_SESSION['user_id'].'"> 
					          </form>
					              ';
					    }
					    else{
					    	$query = "SELECT govrn_emp.name ,employee_complaint.datetime 
			                      FROM employee_complaint,complaint,govrn_emp 
			                      WHERE employee_complaint.employee_id = govrn_emp.id 
			                      AND ".$complaintID." = employee_complaint.complaint_id";
			        		$result_of_query = mysqli_query($connection,$query);
			        		$row_employee = mysqli_fetch_array($result_of_query);

			        		if ($row_employee['name']) {
			        			echo "Η καταγγελία έχει αρχειοθετηθεί απο ".$row_employee['name'];
			        		}
			        		else {
			        			echo "Η καταγγελία έχει αρχειοθετηθεί.";
			        		}
					    	
					    }			          
			        }
		    	}
		      ?>
		    </div></div></div>
		    

		</div>

	</body>
</HTML>