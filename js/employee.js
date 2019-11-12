$( document ).ready(function() {
console.log("w");
});


function post(value){
	console.log(value);
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	       // Action to be performed when the document is read;
	    }
	};
	xhttp.open("GET", "login.php", true);
	xhttp.send();
	//$.post( "/Consumer-Complaint/login.php" );
	/*$.ajax({
        type: 'POST',
        url: 'login.php',
        data: {
            complaintID: value
        }
    }); 
    */
}