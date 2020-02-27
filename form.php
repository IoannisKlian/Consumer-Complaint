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
  <style type="text/css">
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

  <div class="form-row" style="padding: 0; margin:0;">
    <div class="col-md-4 mb-3">
      <label for="name">Όνομα</label>
      <input type="text" class="form-control" id="name" placeholder="Όνομα" name="name" >
    </div>

  
    <div class="col-md-4 mb-3">
      <label for="surname">Επώνυμο</label>
      <input type="text" class="form-control" id="surname" placeholder="Επώνυμο" name="surname">
    </div>

    <div class=" form-check">
      <br><br>
    <input type="checkbox" class="form-check-input" id="checkbox" name="checkbox" value="Yes">
    <label class="form-check-label" for="exampleCheck1">Επιλογή επώνυμης καταγγελίας</label>
  </div>
  </div>


  <div class=" form-row" style="padding: 0; margin:0;">
    <div class="col-md-4 mb-3">
    <label for="phone">Τηλέφωνο επικοινωνίας</label>
    <input type="number" class="form-control" id="phone" data-original-title="" data-placement="right" placeholder="Τηλέφωνο" name="phone">
    </div>
    <div class="col-md-4 mb-3">
      <label for="email">Email address</label>
      <input type="email" data-original-title="" data-placement="right" class="form-control" id="email" placeholder="name@example.com" name="email">
    </div>
  </div>

  <div style="">
  <hr {
    margin-top: 20px;
    margin-bottom: 20px;
    border: 10;
    border-top: 1px solid #eeeeee;
      }>
    </div>

  <div class="form-row" style="padding: 0; margin:0;">
    <div class="col-md-4 mb-3">
      <label for="company_name">Επωνυμία εταιρείας*</label>
      <input type="text" class="form-control" id="company_name" placeholder="Επωνυμία εταιρείας" name="company_name" required>
      <div class="invalid-tooltip">
        Παρακαλώ εισάγετε την σωστή επωνυμία.
      </div>
    </div>

    <div class="col-md-4 mb-3">
      <label for="company_address">Διεύθυνση εταιρείας</label>
      <input type="text" class="form-control" id="company_address" placeholder="Διεύθυνση εταιρείας" name="company_address">
      <button type="button" id="geolocation_btn"><i class="fa fa-map-marker-alt" aria-hidden="true"></i></button>
      <div class="invalid-tooltip">
        Παρακαλώ εισάγετε σωστή διεύθυνση!.
      </div>
    </div>
  </div>

  <div class="form-row" style="padding: 0; margin:0;">
    <div class="col-md-4 mb-3">
      <label for="company_taxId">ΑΦΜ εταιρείας</label>
      <input type="number" class="form-control" id="company_taxId" data-original-title="" data-placement="right" placeholder="ΑΦΜ" name="company_taxId">
    </div>
 
    <div class="col-md-4 mb-3">
      <label for="company_phone">Τηλέφωνο επικοινωνίας εταιρείας</label>
      <input type="number" class="form-control" id="company_phone"data-original-title="" data-placement="right" placeholder="Τηλέφωνο" name="company_phone">
    </div>
  </div>

<div class="form-row" style="padding: 0; margin:0;">
  <div class="input-group col-md-8">
    <div class="input-group-prepend">
    <span class="input-group-text">Περιγραφή προβλήματος*</span>
  </div>
  <textarea style="resize: none;" rows="3" type="text" class="form-control" aria-label="Περιγραφή προβλήματος" id="comment" name="comment" placeholder="Δώστε πληροφορίες σχετικά με το πρόβλημα που αντιμετωπίζεται" required></textarea>
  </div>
</div><br> 


<div class="form-row" style="padding: 0; margin:0;">
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
</script>

<br>

  <div class="row" style="padding:0; margin: 0;">
    <div class="col-sm-4">
      <button type="button" class="btn btn-secondary" value="Submit" id="submit-btn" >Καταχώρηση</button>
    </div>
    <div class="col-sm-4">
      <button type="button" class="btn btn-secondary" value="Submit" id="test-btn" >Test (Temp)</button>
    </div>
  </div>

</form>
<div>
  <p>Τα πεδία που περιέχουν * είναι αναγκαίο να συμπληρωθούν</p>
</div>
</div>

<!-- <div id="map" style="height: 100%"></div> -->

<!--     <script>
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      var map, infoWindow;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 6
        });
        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfREn8CszbxHdERDcxRDZ7cvJ1Zwe56dE&callback=initMap">
    </script> -->
    <script type="text/javascript">
      //Reverse geolocation
      $("#geolocation_btn").on( "click", function() {
        getLocation2();
      }); 
      function getLocation() {
      if (navigator.geolocation) {
            /* Initialise Reverse Geocode API Client */
            var reverseGeocoder=new BDCReverseGeocode();
            
            /* Get the current user's location information, based on the coordinates provided by their browser */
            /* Fetching coordinates requires the user to be accessing your page over HTTPS and to allow the location prompt. */
            reverseGeocoder.getClientLocation(function(result) {
                //console.log(result.principalSubdivision +", "+result.locality);
                $("#company_address").val(result.principalSubdivision +", "+result.locality);

            });

            /* You can also set the locality language as needed */
            reverseGeocoder.localityLanguage='el';

            /* Request the current user's coordinates (requires HTTPS and acceptance of prompt) */


      } 
      else {
       //console.log("Geolocation is not supported by this browser.");
       alert("Ο εντοπισμός τοποθεσίας δεν υποστηρίζεται!")
      }
    }

    function getLocation2() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } 
      else {
       //console.log("Geolocation is not supported by this browser.");
       alert("Ο εντοπισμός τοποθεσίας δεν υποστηρίζεται!")
      }
    }

    function showPosition(position) {
      var request = new XMLHttpRequest()

        request.open('GET', 'https://nominatim.openstreetmap.org/reverse?format=json&lat='+position.coords.latitude+'&lon='+position.coords.longitude+'&zoom=18&addressdetails=1', true)
        request.onload = function() {
          // Begin accessing JSON data here
          var data = JSON.parse(this.response)

          if (request.status >= 200 && request.status < 400) {
            if(typeof data.address.residential !== "undefined"){
              //console.log(data.address.residential+", "+data.address.suburb+", "+data.address.town+", "+data.address.postcode);
              $("#company_address").val(data.address.residential+", "+data.address.suburb+", "+data.address.town+", "+data.address.postcode);
            }
            else{
              //console.log(data.address.suburb+", "+data.address.town+", "+data.address.postcode);
              $("#company_address").val(data.address.suburb+", "+data.address.town+", "+data.address.postcode);
            }

          } else {
            console.log('error')
          }
        }

        request.send()
    }
      
    </script>


</body>
</HTML>

<?php   
  include ("modals/modal_form_anonymous_check.php");
  include ("modals/modal_form_communication_alert.php"); 
?>

