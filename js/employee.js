$( document ).ready(function() {
	
	//Shameful way to handle active navbar buttons, since Bootstrap decided be a little bitch
	var pageName = document.location.href.match(/[^\/]+$/)[0];
	switch(pageName) {
		case "employeeIndex.php":
		$("#employee-open").css('color', 'black');
		$("#employee-pending").css('color', 'gray');
		$("#employee-archived").css('color', 'gray');
		break;
		case "employeePending.php":
		$("#employee-open").css('color', 'gray');
		$("#employee-pending").css('color', 'black');
		$("#employee-archived").css('color', 'gray');
		break;
		case "employeeArchived.php":
		$("#employee-open").css('color', 'gray');
		$("#employee-pending").css('color', 'gray');
		$("#employee-archived").css('color', 'black');
		break;
	}
});


