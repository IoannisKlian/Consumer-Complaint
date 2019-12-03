<!-- Get Sessions -->
<?php 
  session_start();
  include ("time_out_session.php");
  if (!isset($_SESSION['user']) || $_SESSION['user'] == false) {
     header("Location: login.php");
  }

  if (isset($_POST["complaintID"])) {
    $_SESSION['complaintID'] = $_POST["complaintID"];
    $complaintID = $_SESSION['complaintID'];
  }
  else{
    $complaintID = $_SESSION['complaintID'];
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
	    include("employee_nav.php");

	    // Complaint Path and tabs
	    include("complaint_box_navigation.php");
	  ?>

	  <!-- Index of Complaint -->


	  <!-- Complaint Info -->
	  <div class="accordion" id="accordionExample" style="z-index: 5">
		  <div class="card">
		    <div class="card-header" id="headingOne">
		      <h2 class="col-sm">
		        <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
		          Στοιχεία Καταγγελίας <i class="fa fa-angle-down" style="font-size:20px"></i>
		        </button>

		        
		      </h2>
		      
		    </div>

		    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
				<div class="card-body">
			        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
				        <div class="card-body">
							<div class="row">
					            <div class="col-sm-6">
					              <div class="card">
					                <div class="card-body">
					                  <h5 class="card-title">Στοιχεία Καταγγελέα  </h5>
					                  <p class="card-text">
					                    Ονομ/νυμο: <?php echo $fullname; ?><br>
					                    Τηλέφωνο επικοινωνίας: <?php echo $phone; ?><br>
					                    Email address: <?php echo $email; ?></p>
					                </div>
					              </div>
					            </div>
					            <div class="col-sm-6">
									<div class="card">
						                <div class="card-body">
						                  <h5 class="card-title">Στοιχεία Καταγγελόμενου</h5>
						                  <p class="card-text"> Επωνυμία εταιρείας: <?php echo $company_name; ?><br>
						                                        Διεύθυνση εταιρείας: <?php echo $company_address; ?><br>
						                                        ΑΦΜ εταιρείας: <?php echo $company_taxId; ?><br>
						                                        Τηλέφωνο επικοινωνίας εταιρείας: <?php echo $company_phone; ?></p>
						                </div>
					            	</div>
					            </div>
							</div>
				        </div>
					</div>
			    </div>
			</div>
		</div>
	  </div>
	  <div class="card">
	    <div class="card-header" id="headingTwo">
	      <h6 class="mb-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "Ημερομηνία καταβολής: ".$date_added; ?></h6>
	    </div>
	  </div>

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

	    <div class="card-body">
	    <div class="row">
	      <div class="col-sm-12">
	        <div class="card">
	            <div class="card-body">
	                <h5 class="card-title">Αποδεικτικά στοιχεία</h5>
	              </div>
	            </div>
	          </div>
	        </div>
	    </div><br>



		<div class="card-body">
		    <div class="row">
		      <div class="col-sm-4">
		    <?php
		      if(isset($_SESSION['id'])){

		      //This checks whether the complaint has assign to someone or not
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
		       $query_close_button = "SELECT * FROM `employee_complaint` WHERE `employee_id` = '".$_SESSION['id']."' AND `complaint_id` = '".$complaintID."'"; 
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
				    	echo "Η καταγγελία έχει αρχειοθετηθεί απο ".$row_employee['name'];
				    }			          
		        }
		     }
		      ?>
		    </div></div></div>
		    

		</div>

	</body>
</HTML>