<?php 
  session_start();
  include ("../time_out_session.php");
  if (!isset($_SESSION['user']) || $_SESSION['user'] == false || $_SESSION['id'] != 1) {
     header("Location: login.php");
  }
  include ("../../connect.php");
  if (isset($_GET["page_id"])) {
    $_SESSION['pageID'] = $_GET["page_id"];
  }
  else{
    $_SESSION['pageID'] = 0;
  }
?>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	  <meta charset="utf-8" />
</head>
<body>
	<?php include("../employee_nav.php");?>
	<div class="container">
		<div class="row" id="add-user" style="padding-top: 2%;">
		    <?php include("admin_add_user"); ?>
		</div>
		<hr>
		<div class="row" id="remove-user" style="padding-top: 3%;padding-bottom: 3%;">
		    <?php include("admin_remove_user"); ?>
		</div>
		<hr>
		<div class="row" id="update-user" style="padding-top: 3%;padding-bottom: 3%;">
			<?php include("admin_update_user"); ?>
		</div>
		
	</div>

</body>
</html>