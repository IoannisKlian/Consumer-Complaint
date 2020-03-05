<?php
include ("../time_out_session.php");
  if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
  }
  ?>

  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 style="display: inline;" class="col-sm">
        <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          Καταγγελλόμενο περιστατικό <i class="fa fa-angle-down" style="font-size:20px"></i>
        </button> 
      </h2>
      <h5 style="display: inline;float: right;"><?php echo "Αριθμός καταγγελίας "."#".$_SESSION['complaintID'];?></h5>    
    </div>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
		<div class="card-body">
	        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
		        <div class="card-body">
					<div class="row">
			            <div class="col-sm-6">
			              <div class="card">
			                <div class="card-body">
			                  <h5 class="card-title">Στοιχεία καταναλωτή  </h5>
			                  <p class="card-text">
			                    Ονομ/νυμο: <b><?php echo $fullname; ?></b><br>
			                    Τηλέφωνο επικοινωνίας:<b> <?php echo $phone; ?></b><br>
			                    Διεύθυνση e-mail: <b><?php echo $email; ?></b>
			                    <?php if ($email != "-"){ ?>
			                    	<div>
			                    		<button class="btn btn-success" onclick="location.href=<?php echo "'mailto:".$email."?subject=Καταγγελία #".$_SESSION['complaintID']."'"; ?>;">
			                    			<i class="fas fa-envelope"></i>&nbsp;Αποστολή e-mail!
			                    		</button>
			                    	</div>
			                    </p>
			                    	
			                    <?php }; ?>
			                </div>
			              </div>
			            </div>
			            <div class="col-sm-6">
							<div class="card">
				                <div class="card-body">
				                  <h5 class="card-title">Στοιχεία καταγγελλόμενης επιχείρησης</h5>
				                  <p class="card-text"> Επωνυμία επιχείρησης: <b><?php echo $company_name; ?></b><br>
				                                        Διεύθυνση επιχείρησης: <b><?php echo $company_address; ?></b><br>
				                                        ΑΦΜ επιχείρησης: <b><?php echo $company_taxId; ?></b><br>
				                                        Τηλέφωνο επικοινωνίας επιχείρησης: <b><?php echo $company_phone; ?></b><br>
				                                        <div>
				                                        <?php if ($company_address == "-"){ ?>
									                    	<button class="btn btn-success" onclick="
									                    	<?php echo"window.open('https://www.vrisko.gr/search/".$company_name."/')";?>
									                    		" type="button">
									                    		<i class="fas fa-search"></i>&nbsp;Εύρεση επιχείρησης
									                    	</button>
									                    <?php }else{ ?>
									                    	<button class="btn btn-success" onclick="
									                    	<?php echo"window.open('https://www.vrisko.gr/search/".$company_name."/".$company_address."/')";?>
									                    		" type="button">
									                    		<i class="fas fa-search"></i>&nbsp;Εύρεση επιχείρησης
									                    	</button>

									                    	<?php } ?>
									                    	</div>
										                      </p>
				                </div>
			            	</div>
			            </div>
					</div>
		        </div>
			</div>
	    </div>
	</div>
</div>