$( document ).ready(function() {
	
	//Shameful way to handle active navbar buttons, since Bootstrap decided be a little bitch
	var pageName = document.location.href.match(/[^\/]+$/)[0];

	if (pageName.includes("complaint_box")) {
		$("#info-tab").css({
			"width": "100%", 
			"background-color": "#f7f7f7", 
			"border": "none", 
			"bottom": "-10px", 
			"position": "relative", 
			"color": "black", 
			"z-index": "7"
		});
		$("#log-tab").css({
			"width": "100%", 
			"color": "white", 
			"border": "none", 
			"bottom": "-1px", 
			"position": "relative", 
			"z-index": "6"
		});
	}
	else if (pageName.includes("log")) {
		$("#log-tab").css({
			"width": "100%", 
			"background-color": "#f7f7f7", 
			"border": "none", 
			"bottom": "-10px", 
			"position": "relative", 
			"color": "black", 
			"z-index": "7"
		});
		$("#info-tab").css({
			"width": "100%", 
			"color": "white", 
			"border": "none", 
			"bottom": "-1px", 
			"position": "relative", 
			"z-index": "6"
		});
	}
});


