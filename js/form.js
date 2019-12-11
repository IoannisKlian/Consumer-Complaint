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
		
		if(checkValidInput($("#email"),"Λάθος email!"))
			return;
		else if (checkValidInput($("#phone"),"Λαθός τηλεφωνο!"))
			return;
		else if (checkValidInput($("#company_taxId"),"Λάθος αριθμός ΑΦΜ!"))
			return;
		else if (checkValidInput($("#company_phone"),"Λάθος αριθμός τηλεφώνου!"))
			return;

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
		document.getElementById("checkbox").checked = false;
		submitForm();
	}); 

	// Refresh to name of file selected for upload instead of the default string.
	$('.custom-file-input').on('change', function() { 
		   let fileName = $(this).val().split('\\').pop(); 
		   $(this).next('.custom-file-label').addClass("selected").html(fileName); 
	});
	$(document).on('click', '#close-preview', function(){ 
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
        }, 
         function () {
           $('.image-preview').popover('hide');
        }
    );    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse"); 
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:350,
            height:200
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});

});

		

function submitForm() {
	if (document.getElementById("comment").checkValidity() && document.getElementById("company_name").checkValidity()) {
		document.getElementById("form").submit();
	}
	else {
		document.getElementById("company_name").setCustomValidity("Παρακαλώ συμπληρώστε το πεδίο!");
		document.getElementById("comment").setCustomValidity("Παρακαλώ συμπληρώστε το πεδίο!");
	}
}

function checkForAnonimity() {
	// Anonymity Check. In case a name and surname does not exist, a modal will ask the user to confirm anynymous form.
	if(isEmpty($("#name")) && isEmpty($("#surname")) && document.getElementById("checkbox").checked) {
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


  function checkValidInput(input,text) {
  	var id = input;

		if(!id[0].checkValidity()){
			id.tooltip('dispose').tooltip({title: text }); 
			return true;
		}
		else{
			id.tooltip("hide");
			return false;
		}
  }


  



