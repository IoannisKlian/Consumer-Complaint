
<?php  
  include ("connect.php");
  include ("modals/modal_form_anonymous_check.php");
  include ("modals/modal_form_communication_alert.php");
?>


<HTML>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/form.js"></script>

</head>

<body>

<form action="complaintSumbitHandler.php" id="form" method="post" enctype="multipart/form-data">

  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="name">Όνομα</label>
      <input type="text" class="form-control" id="name" placeholder="Όνομα" name="name">
    </div>

  
    <div class="col-md-4 mb-3">
      <label for="surname">Επώνυμο</label>
      <input type="text" class="form-control" id="surname" placeholder="Επώνυμο" name="surname">
    </div>
  </div>

  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="address">Διεύθυνση</label>
      <input type="text" class="form-control" id="address" placeholder="Διεύθυνση" name="address">
    </div>
 
    <div class="col-md-4 mb-3">
      <label for="email">Email address</label>
      <input type="text" class="form-control" id="email" placeholder="name@example.com" name="email">
    </div>
  </div>

  <div class="form-row">
    <div class="col-md-4 mb-3">
    <label for="phone">Τηλέφωνο επικοινωνίας</label>
    <input type="numbers" class="form-control" id="phone" placeholder="Τηλέφωνο" name="phone">
    </div>
  </div>


  <input type="text" placeholder="Επωνυμία εταιρείας" id="company_name" name="company_name" required>

  <span class="error">*</span><br>
  <input type="text" placeholder="Διεύθυνση εταιρείας" id="company_address" name="company_address">
  <span class="error">*</span><br>
  <input type="numbers" placeholder="Τηλέφωνο επικοινωνίας εταιρείας" id="company_phone" name="company_phone">
  <span class="error">*</span><br>
  <input type="numbers" placeholder="ΑΦΜ εταιρείας" id="company_taxId" name="company_taxId">
  <span class="error">*</span><br><br>

  <div class="input-group">
    <div class="input-group-prepend">
    <span class="input-group-text">Περιγραφή προβλήματος</span>
  </div>
  <textarea class="form-control" aria-label="Περιγραφή προβλήματος" id="comment" name="comment" placeholder="text" required></textarea>
  </div>
  
  <br><br> 

  Evidence file(image,audio etc.): Select image to upload:
    <br>
  <input type="file" name="file" id="file"><br>

  <input type="button" id="submit-btn" name="submit-btn" value="Submit">

</form>
</body>
<script type="text/javascript" src="js/form.js"></script>
</HTML>
<?php  
  include ("connect.php");
  include ("modals/modal_form_anonymous_check.php");
  include ("modals/modal_form_communication_alert.php");
?>

