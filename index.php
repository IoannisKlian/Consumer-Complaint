<?php  

	include ("connect.php");
	?>

<HTML>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
	
<form action="complaintSumbitHandler.php" method="post">
<input type="text" placeholder="Όνομα" name="name"><br>
<input type="text" placeholder="Επώνυμο" name="surname"><br>
<input type="text" placeholder="Διεύθυνση" name="address"><br>
<input type="text" placeholder="E-mail" name="email"><br>
<input type="numbers" placeholder="Τηλέφωνο επικοινωνίας" name="phone"><br>
<input type="text" placeholder="Επωνυμία εταιρείας" name="company_name" required>
<span class="error">*</span><br>
<input type="text" placeholder="Διεύθυνση εταιρείας" name="company_address" required>
<span class="error">*</span><br>
<input type="numbers" placeholder="Τηλέφωνο επικοινωνίας εταιρείας" name="company_phone" required>
<span class="error">*</span><br>
<input type="numbers" placeholder="ΑΦΜ εταιρείας" name="company_taxId"required>
<span class="error">*</span><br>

<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">Περιγραφή προβλήματος</span>
  </div>
  <textarea class="form-control" aria-label="Περιγραφή προβλήματος" name="comment"></textarea>
</div><br>

Evidence file(image,audio etc.): Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload"><br>
 
 <select name="nomoi_elladas">
    <option value="Αττική">Αττική</option>
    <option value="Θεσσαλονίκη">Θεσσαλονίκη</option>
    <option value="Αχαϊα">Αχαϊα</option>
    <option value="Έβρου">Έβρου</option>
    <option value="Ροδόπης">Ροδόπης</option>
    <option value="Ξάνθης">Ξάνθης</option>
    <option value="Δράμας">Δράμας</option>
    <option value="Καβάλας">Καβάλας</option>
    <option value="Χαλκιδικής">Χαλκιδικής</option>
    <option value="Ημαθίας">Ημαθίας</option>
    <option value="Κιλκίς">Κιλκίς</option>
    <option value="Πέλλας">Πέλλας</option>
    <option value="Πιερίας">Πιερίας</option>
    <option value="Σερρών">Σερρών</option>
    <option value="Κοζάνης">Κοζάνης</option>
    <option value="Φλώρινας">Φλώρινας</option>
    <option value="Γρεβενών">Γρεβενών</option>
    <option value="Καστοριάς">Καστοριάς</option>
    <option value="Ιωαννίνων">Ιωαννίνων</option>
    <option value="Άρτας">Άρτας</option>
    <option value="Πρέβεζας">Πρέβεζας</option>
    <option value="Ξάνθης">Ξάνθης</option>
    <option value="Θεσπρωτίας">Θεσπρωτίας</option>
    <option value="Λάρισας">Λάρισας</option>
    <option value="Καρδίτσας">Καρδίτσας</option>
    <option value="Μαγνησίας">Μαγνησίας</option>
    <option value="Τρικάλων">Τρικάλων</option>
    <option value="Βοιωτίας">Βοιωτίας</option>
    <option value="Ευβοίας">Ευβοίας</option>
    <option value="Ευρυτανίας">Ευρυτανίας</option>
    <option value="Φωκίδας">Φωκίδας</option>
    <option value="Φθιώτιδας">Φθιώτιδας</option>
    <option value="Κεφαλληνίας">Κεφαλληνίας</option>
    <option value="Κέρκυρας">Κέρκυρας</option>
    <option value="Λευκάδας">Λευκάδας</option>
    <option value="Ζακύνθου">Ζακύνθου</option>
    <option value="Ηλείας">Ηλείας</option>
    <option value="Αιτωλοακαρνανίας">Αιτωλοακαρνανίας</option>
    <option value="Αρκαδίας">Αρκαδίας</option>
    <option value="Αργολίδας">Αργολίδας</option>
    <option value="Κορινθίας">Κορινθίας</option>
    <option value="Λακωνίας">Λακωνίας</option>
    <option value="Μεσσηνίας">Μεσσηνίας</option>
    <option value="Χίου">Χίου</option>
    <option value="Σάμου">Πιερίας</option>
    <option value="Κυκλάδων">Κυκλάδων</option>
    <option value="Δωδεκανήσου">Δωδεκανήσου</option>
    <option value="Ηρακλείου">Ηρακλείου</option>
    <option value="Χανίων">Χανίων</option>
    <option value="Λασιθίου">Λασιθίου</option>
    <option value="Ρεθύμνης">Ρεθύμνης</option>
    <option value="Λέσβου">Λέσβου</option>


  </select><br>
  
GPS location:  
<br><script>
var x = document.getElementById("demo");
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude +
  "<br>Longitude: " + position.coords.longitude;
}
</script><br> 


<input type="submit" name="submit">
</form>
</HTML>