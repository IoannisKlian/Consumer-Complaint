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
<input type="text" placeholder="Όνομα" name="name">
<input type="text" placeholder="Επώνυμο" name="surname"><br>
<input type="text" placeholder="Διεύθυνση" name="address"><br>
<input type="text" placeholder="E-mail" name="email"><br>
<input type="numbers" placeholder="Phone number" name="phone"><br>
<input type="text" placeholder="Complainee Company name" name="company_name" required>
<span class="error">*</span><br>
<input type="text" placeholder="Complainee Company address" name="company_address" required>
<span class="error">*</span><br>
<input type="numbers" placeholder="Complainee Company Phone number" name="company_phone" required>
<span class="error">*</span><br>
<input type="numbers" placeholder="Complainee Company Tax Id" name="company_taxId"required>
<span class="error">*</span><br>
<textarea rows="4" cols="50" name="comment" form="usrform">

Enter here Complaint Description:...</textarea><br>
Evidence file(image,audio etc.): <input type="text" name="file_upload" required><br>

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