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

<form action="complaintSumbitHandler.php" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="exampleFormControlInput1">Όνομα</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ιωάννης" name="name">
  </div>

<div class="form-group">
    <label for="exampleFormControlInput1">Επώνυμο</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Παραπόλας" name="surname">
  </div>

<div class="form-group">
    <label for="exampleFormControlInput1">Διεύθυνση</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Λεωφ. Αλεξάνδρας 205" name="address">
  </div>

<div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Τηλέφωνο επικοινωνίας</label>
    <input type="numbers" class="form-control" id="exampleFormControlInput1" placeholder="6941234567" name="phone">
  </div>

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

Evidence file(image,audio etc.): Select image to upload:
  <br>
<input type="file" name="file" id="file">

<input type="submit" name="submit">
</form>
</body>
</HTML>