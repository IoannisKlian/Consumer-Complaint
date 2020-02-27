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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/gh/bigdatacloudapi/js-reverse-geocode-client@latest/bigdatacloud_reverse_geocode.min.js" type="text/javascript"></script> 
  <script type="text/javascript" src="js/form.js"></script>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <style>
    input[type="number"] {
      -webkit-appearance: textfield;
         -moz-appearance: textfield;
              appearance: textfield;
    }
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
      -webkit-appearance: none;
    }

    .fileinput-upload{
      display: none;
    }

    @media (min-width:768px){
      #named-container {
        position: absolute;
        bottom: 0;
      }
    }
</style>

</head>

<!-- Body -->
<body style="background-color:#f7f7f7;padding: 0;margin:0;">

  <!-- Title -->
  <div class="form-label" style="background-color: #e9ecef" > 
    <div style="font-size: 3vh; color: #5b5d5f; padding-left:5%; padding-top: 1vh; padding-bottom: 1vh;"> Φόρμα Καταγγελείας Υπηρεσίας</div>
  </div>

  <!-- Main container -->
  <div  style="padding-top: 2%;">

    <!-- Form -->
    <form class="form-horizontal" action="complaintSumbitHandler.php" id="form" method="post" enctype="multipart/form-data">

      <!-- Title for Complainer  -->
      <div class="form-label" style="background-color: #e9ecef"> 
        <div style="font-size: 2vh; color: #5b5d5f; padding-left:5%; padding-top: 0.5vh; padding-bottom: 0.5vh;"> Ατομικά Στοιχεία</div>
      </div>

      <!-- DIV for complainer -->
      <div class="complainer-container" style=" padding-left: 5%; padding-top: 1%; padding-bottom: 1%;">
        <div class="form-row" style="padding: 0; margin:0;">
          <div class="col-md-4 mb-3">
            <label for="name">Όνομα</label>
            <input type="text" class="form-control" id="name" placeholder="Όνομα" name="name" >
          </div>

        
          <div class="col-md-4 mb-3">
            <label for="surname">Επώνυμο</label>
            <input type="text" class="form-control" id="surname" placeholder="Επώνυμο" name="surname">
          </div>

          <div class="col-md-4 mb-3">
            <div id="named-container">
              <label class="form-check-label" for="checkbox">Επιλογή επώνυμης καταγγελίας</label>
              <input type="checkbox" id="checkbox" name="checkbox" value="Yes">
            </div>
          </div>
        </div>


        <div class=" form-row" style="padding: 0; margin:0;">
          <div class="col-md-4 mb-3">
          <label for="phone">Τηλέφωνο επικοινωνίας</label>
          <input type="number" class="form-control" id="phone" data-original-title="" data-placement="right" placeholder="Τηλέφωνο" name="phone">
          </div>
          <div class="col-md-4 mb-3">
            <label for="email">Ηλεκτρονική Διεύθυνση</label>
            <input type="email" data-original-title="" data-placement="right" class="form-control" id="email" placeholder="name@example.com" name="email">
          </div>
        </div>
      </div>

      <!-- End DIV for Complainer -->

      <!-- Title for Enterprise  -->
      <div class="form-label" style="background-color: #e9ecef;"> 
        <div style="font-size: 2vh; color: #5b5d5f; padding-left:5%; padding-top: 0.5vh; padding-bottom: 0.5vh;"> Στοιχεία Επιχείρησης</div>
      </div>

      <!-- DIV for Enterprise -->
      <div class="enterprise-container" style=" padding-left: 5%; padding-top: 1%; padding-bottom: 1%;">
        <div class="form-row" style="padding: 0; margin:0;">
          <div class="col-md-4 mb-3">
            <label for="company_name">Επωνυμία Επιχείρησης*</label>
            <input type="text" class="form-control" id="company_name" placeholder="Επωνυμία Επιχείρησης" name="company_name" required>
            <div class="invalid-tooltip">
              Παρακαλώ εισάγετε την σωστή επωνυμία.
            </div>
          </div>

          <div class="col-md-4 mb-3">
            <label for="company_address">Διεύθυνση Επιχείρησης</label>
            <div style="display: flex;flex-direction: row;">
            <input type="text" class="form-control" id="company_address" placeholder="Διεύθυνση Επιχείρησης" name="company_address">
                          <button type="button" id="geolocation_btn" class="btn btn-secondary" style="font-size:24px">
                <span class="fa fa-map-marker-alt" style="height: 100%;"></span>
              </button>
            <div class="invalid-tooltip">
              Παρακαλώ εισάγετε σωστή διεύθυνση!.
            </div>
          </div>
          </div>
        </div>

        <div class="form-row" style="padding: 0; margin:0;">
          <div class="col-md-4 mb-3">
            <label for="company_taxId">ΑΦΜ Επιχείρησης</label>
            <input type="number" class="form-control" id="company_taxId" data-original-title="" data-placement="right" placeholder="ΑΦΜ" name="company_taxId">
          </div>
       
          <div class="col-md-4 mb-3">
            <label for="company_phone">Τηλέφωνο επικοινωνίας Επιχείρησης</label>
            <input type="number" class="form-control" id="company_phone"data-original-title="" data-placement="right" placeholder="Τηλέφωνο" name="company_phone">
          </div>
        </div>
      </div>

      <!-- End DIV for Enterprise -->

      <!-- Title for Complaint Details  -->
      <div class="form-label" style="background-color: #e9ecef;"> 
        <div style="font-size: 2vh; color: #5b5d5f; padding-left:5%; padding-top: 0.5vh; padding-bottom: 0.5vh;"> Στοιχεία Προβλήματος</div>
      </div>

      <!-- DIV for Complaint Details -->
      <div class="complaint-container" style=" padding-left: 5%; padding-top: 1%; padding-bottom: 1%;">
        <div class="form-row" style="padding: 0; margin:0;">
          <div class="input-group col-md-8">
            <div class="input-group-prepend">
            <span class="input-group-text">Περιγραφή προβλήματος*</span>
          </div>
          <textarea style="resize: none;" rows="3" type="text" class="form-control" aria-label="Περιγραφή προβλήματος" id="comment" name="comment" placeholder="Δώστε πληροφορίες σχετικά με το πρόβλημα που αντιμετωπίζεται" required></textarea>
          </div>
        </div><br> 


        <div class="form-row" style="padding: 0; margin:0;">
        	<div class="input-group col-md-8">
        	  <div class="input-group-prepend">
        	    <span class="input-group-text" id="inputGroupFileAddon01">Αποδεικτικά στοιχεία</span>
        	  </div>
            <div class="file-loading">
                  <input id="file" name="file" type="file" multiple class="file" data-overwrite-initial="false" data-min-file-count="2">
             </div>
        	</div>
        </div>
      </div>

    <br>

      <div class="row" style="padding:0; margin: 0; ">
        <div class="col-sm-4" style="padding-left: 5%;">
          <button type="button" class="btn btn-secondary" value="Submit" id="submit-btn" >Καταχώρηση</button>
        </div>
<!--         <div class="col-sm-4">
          <button type="button" class="btn btn-secondary" value="Submit" id="test-btn" >Test (Temp)</button>
        </div> -->
      </div>

    </form>

    <!-- End Form -->

    <div style="padding-left: 5%;">
      <p>Τα πεδία που περιέχουν * είναι αναγκαίο να συμπληρωθούν</p>
    </div>
  </div>

  <!-- End Main Container -->

  <script type="text/javascript">
    $("#file").fileinput({
      theme: '',
      browseLabel: "Αναζήτηση",
      removeLabel: "Διαγραφή",
      initialCaption: " ",
      hideThumbnailContent:false,
      viewDetails:false,
      showZoom:false,
      allowedFileExtensions: ['jpg', 'png', 'gif','pdf','PDF'],
      overwriteInitial: false,
      maxFileSize:8000,
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

    $("#geolocation_btn").on( "click", function() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          var pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          };
          var url = "https://maps.googleapis.com/maps/api/geocode/json?latlng="+pos.lat+","+pos.lng+"&key=AIzaSyD66HFGjShwc9-Lqj-dZXckhnV0wcK1BuY&language=el";
          fetch(url)
          .then(response => response.json())
          .then(data => {
            $("#company_address").val(data.results[0].formatted_address);
          })
        })
      }
    });

  </script>

</body>
</HTML>

<?php   
  include ("modals/modal_form_anonymous_check.php");
  include ("modals/modal_form_communication_alert.php"); 
?>

