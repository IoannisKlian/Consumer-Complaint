$( document ).ready(function() {
	
	//Shameful way to handle active navbar buttons, since Bootstrap decided be a little bitch
	var pageName = document.location.href.match(/[^\/]+$/)[0];

		if (pageName.includes("employeeIndex")) {
			$("#employee-open").css('color', 'black');
			$("#employee-pending").css('color', 'gray');
			$("#employee-archived").css('color', 'gray');
		}
		else if (pageName.includes("employeePending")) {
			$("#employee-open").css('color', 'gray');
			$("#employee-pending").css('color', 'black');
			$("#employee-archived").css('color', 'gray');
		}
		else if (pageName.includes("employeeArchived")) {
			$("#employee-open").css('color', 'gray');
			$("#employee-pending").css('color', 'gray');
			$("#employee-archived").css('color', 'black');
		}
});


