console.log("hello");
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

	$("#submit").on( "click", function() {

		// Communication Alert
		if(isEmpty($("#email")) && isEmpty($("#phone"))) {
			$("#communication_modal").modal();
		}

		// Anonymity Check
		else if(isEmpty($("#name")) || isEmpty($("#surname"))) {
			$("#anonymous_modal").modal();
		}
	}); 

});

function isEmpty( el ){
      return el.val() == "";
  }