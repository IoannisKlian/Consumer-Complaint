<?php 
  session_start();
  $complaintID = $_POST['complaintID'];
  $_SESSION['complaintID'] = $complaintID;

  include("complaintInformation.php");
?>
<HTML>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/form.js"></script>
  <meta charset="utf-8" />
</head>
<body>
  <div style="padding-left:0.75%; padding-right:0.75%;">
  <div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Στοιχεία Καταγγελίας
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Στοιχεία Καταγγελέα </h5>
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
      <h2 class="mb-0">
      </h2>
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
    </div><br>

    
  <button type="button" class="btn btn-secondary" value="Submit" id="submit-btn" >Ανάθεση</button>
</div>

  <?php 
  ?>
</body>
</HTML>