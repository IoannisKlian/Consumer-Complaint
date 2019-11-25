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
		
		
		checkValidInput($("#email"));
		checkValidInput($("#phone"));
		checkValidInput($("#company_taxId"));
		checkValidInput($("#company_phone"));

		// Communication Alert. The user must input at least a phone, or an email. If not a modal will alert. 
		if(isEmpty($("#email")) && isEmpty($("#phone"))) {
			$("#communication_modal").modal();
		}
		else {
			checkForAnonimity();
		}

	}); 

	// Check for anonimity after communication modal
	$("#com-no").on( "click", function() {
		checkForAnonimity();
	}); 

	// If the user confirms that they want an anonymous form, clicking this button on modal_form_anonymous.php will submit the form normally.
	$("#anon_form_confirm").on( "click", function() {

		submitForm();
	}); 

	// Refresh to name of file selected for upload instead of the default string.
	$('.custom-file-input').on('change', function() { 
		   let fileName = $(this).val().split('\\').pop(); 
		   $(this).next('.custom-file-label').addClass("selected").html(fileName); 
	});

});

function submitForm() {
	if (document.getElementById("comment").checkValidity() && document.getElementById("company_name").checkValidity()) {
		document.getElementById("form").submit();
	}
	else {
		document.getElementById("company_name").setCustomValidity("yooooo");
		document.getElementById("comment").setCustomValidity("yooooo");
	}
}

function checkForAnonimity() {
	// Anonymity Check. In case a name and surname does not exist, a modal will ask the user to confirm anynymous form.
	if(isEmpty($("#name")) || isEmpty($("#surname"))) {

		$("#anonymous_modal").modal();

	}

	// If the above fields are filled, the form will be sumbmited.
	else {
		submitForm();
	}
};

function isEmpty( el ){
      return el.val() == "";
  }


  function checkValidInput(input) {
  	var id = input;

		if(!id[0].checkValidity()){
			id.tooltip("show");
			return;
		}
		else{
			id.tooltip("hide");
		}
  }


  



