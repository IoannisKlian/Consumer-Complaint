$( document ).ready(function() {
// var x = document.getElementById("demo");
// function getLocation() {
//   if (navigator.geolocation) {
//     navigator.geolocation.getCurrentPosition(showPosition);
//   } else {
//     x.innerHTML = "Geolocation is not supported by this browser.";
//   }
// }

// function showPosition(position) {
//   x.innerHTML = "Latitude: " + position.coords.latitude +
//   "<br>Longitude: " + position.coords.longitude;
// }

	// Check on the submit button in the form
	$("#submit-btn").on( "click", function() {
			console.log('in')

		// Communication Alert. The user must input at least a phone, or an email. If not a modal will alert. 
		if(isEmpty($("#email")) && isEmpty($("#phone"))) {
			$("#communication_modal").modal();
		}

		// Anonymity Check. In case a name and surname does not exist, a modal will ask the user to confirm anynymous form.
		else if(isEmpty($("#name")) || isEmpty($("#surname"))) {

			$("#anonymous_modal").modal();

		}

		// If the above fields are filled, the form will be sumbmited.
		else {
			document.getElementById("form").submit();
		}
	}); 

	// If the user confirms that they want an anonymous form, clicking this button on modal_form_anonymous.php will submit the form normally.
	$("#anon_form_confirm").on( "click", function() {

		document.getElementById("form").submit();
	}); 

});

function isEmpty( el ){
      return el.val() == "";
  }