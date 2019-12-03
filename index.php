<?php  
  header('Content-Type: text/html; charset=utf-8');
  include ("connect.php");
?>


<HTML>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/form.js"></script>
  <meta charset="utf-8" />
  <style type="text/css">
    input[type="number"] {
      -webkit-appearance: textfield;
         -moz-appearance: textfield;
              appearance: textfield;
    }
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
      -webkit-appearance: none;
    }
  </style>

</head>

<body style="background-color:#f7f7f7;overflow: hidden;">
<div  style="padding-left:5%;padding-top: 2%;">

<form class="form-horizontal" action="complaintSumbitHandler.php" id="form" method="post" enctype="multipart/form-data">

  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="name">Όνομα</label>
      <input type="text" class="form-control" id="name" placeholder="Όνομα" name="name" >
    </div>

  
    <div class="col-md-4 mb-3">
      <label for="surname">Επώνυμο</label>
      <input type="text" class="form-control" id="surname" placeholder="Επώνυμο" name="surname">
    </div>

    <div class="form-check">
      <br><br>
    <input type="checkbox" class="form-check-input" id="checkbox" name="checkbox" value="Yes">
    <label class="form-check-label" for="exampleCheck1">Επιλογή επώνυμης καταγγελίας</label>
  </div>
  </div>


  <div class="form-row">
    <div class="col-md-4 mb-3">
    <label for="phone">Τηλέφωνο επικοινωνίας</label>
    <input type="number" class="form-control" id="phone" data-original-title="" data-placement="right" placeholder="Τηλέφωνο" name="phone">
    </div>
    <div class="col-md-4 mb-3">
      <label for="email">Email address</label>
      <input type="email" data-original-title="" data-placement="right" class="form-control" id="email" placeholder="name@example.com" name="email">
    </div>
  </div>

  <div style="padding-right:33.6%;">
  <hr {
    margin-top: 20px;
    margin-bottom: 20px;
    border: 10;
    border-top: 1px solid #eeeeee;
      }>
    </div>

  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="company_name">Επωνυμία εταιρείας*</label>
      <input type="text" class="form-control" id="company_name" placeholder="Επωνυμία εταιρείας" name="company_name" required>
      <div class="invalid-tooltip">
        Please provide a valid city.
      </div>
    </div>

    <div class="col-md-4 mb-3">
      <label for="company_address">Διεύθυνση εταιρείας</label>
      <input type="text" class="form-control" id="company_address" placeholder="Διεύθυνση εταιρείας" name="company_address">
      <div class="invalid-tooltip">
        Please provide a valid address.
      </div>
    </div>
  </div>

  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="company_taxId">ΑΦΜ εταιρείας</label>
      <input type="number" class="form-control" id="company_taxId" data-original-title="" data-placement="right" placeholder="ΑΦΜ" name="company_taxId">
    </div>
 
    <div class="col-md-4 mb-3">
      <label for="company_phone">Τηλέφωνο επικοινωνίας εταιρείας</label>
      <input type="number" class="form-control" id="company_phone"data-original-title="" data-placement="right" placeholder="Τηλέφωνο" name="company_phone">
    </div>
  </div>

<div style="padding-right:33.6%;">
  <div class="input-group">
    <div class="input-group-prepend">
    <span class="input-group-text">Περιγραφή προβλήματος*</span>
  </div>
  <textarea style="resize: none;" rows="3" class="form-control" aria-label="Περιγραφή προβλήματος" id="comment" name="comment" placeholder="Δώστε πληροφορίες σχετικά με το πρόβλημα που αντιμετωπίζεται" required></textarea>
  </div>
</div><br> 


<div style="padding-right:33.6%;">
	<div class="input-group">
	  <div class="input-group-prepend">
	    <span class="input-group-text" id="inputGroupFileAddon01">Αποδεικτικά στοιχεία</span>
	  </div>
	  <div class="custom-file">
	    <input type="file" class="custom-file-input" id="file" name="file" 
	      aria-describedby="inputGroupFileAddon01">
	    <label class="custom-file-label" for="inputGroupFile01">Επιλέξτε αρχείο...(εικόνα ή PDF)</label>
	  </div>
	</div>

</div>
<br>

  <button type="button" class="btn btn-secondary" value="Submit" id="submit-btn" >Submit</button>

</form>
<div>
  <p>Τα πεδία που περιέχουν * είναι αναγκαίο να συμπληρωθούν</p>
</div>
</div>

</body>
</HTML>

<?php   
  include ("modals/modal_form_anonymous_check.php");
  include ("modals/modal_form_communication_alert.php"); 
?>