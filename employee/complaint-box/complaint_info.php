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