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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
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
    .main-section{
  margin:0 auto;
  padding: 20px;
  margin-top: 100px;
  background-color: #fff;
  box-shadow: 0px 0px 20px #c1c1c1;
}
.fileinput-upload{
  display: none;
}
  </style>

</head>

<body style="background-color:#f7f7f7;padding: 0;margin:0;">
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
    <div class="file-loading">
          <input id="file" name="file" type="file" multiple class="file" data-overwrite-initial="false" data-min-file-count="2">
     </div>
	</div>
</div>
<script type="text/javascript">
  $("#file").fileinput({
    theme: 'fa',
    browseLabel: "Αναζήτηση",
    removeLabel: "Διαγραφή",
    initialCaption: " ",
    hideThumbnailContent:false,
    viewDetails:false,
    showZoom:false,
    allowedFileExtensions: ['jpg', 'png', 'gif','pdf','PDF'],
    overwriteInitial: false,
    maxFileSize:2000,
    maxFilesNum: 10,
    fileActionSettings: {
                        showRemove: true,
                        showUpload: false,
                        showZoom: false,
                        showDrag: false},
    slugCallback: function (filename) {
        return filename.replace('(', '_').replace(']', '_');
    }
});
</script>

<br>

  <div class="row">
    <div class="col">
      <button type="button" class="btn btn-secondary" value="Submit" id="submit-btn" >Καταχώρηση</button>
    </div>
    <div class="col">
      <button type="button" class="btn btn-secondary" value="Submit" id="test-btn" >Test (Temp)</button>
    </div>
  </div>

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