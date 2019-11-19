<?php
  session_start();
  include ("time_out_session.php");
  //if (!isset($_SESSION['user']) || $_SESSION['user'] == false) {
      //header("Location: login.php");
  //}
?>

<HTML>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/employee.js"></script>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style type="text/css">
    .pagination{
  position: fixed;
  top: 90%;
  left: 50%;
  -webkit-transform: translate(-0%, -50%);
  transform: translate(-90%, -50%);
  

}
</style>
</head>
<body>

<?php

  include("employee_nav.php");

  if (isset($_GET['pageno'])) {
      $pageno = $_GET['pageno'];
  } else {
      $pageno = 1;
  }
  $no_of_records_per_page = 5;
  $offset = ($pageno-1) * $no_of_records_per_page;

  include ("../connect.php");
  if (isset($_GET["page_id"])) {
    $_SESSION['pageID'] = $_GET["page_id"];
  }
  else{
    $_SESSION['pageID'] = 1;
  }

  if ($_SESSION['pageID'] == 1) {

    $userID=$_SESSION['id'];

    $total_pages_sql = "SELECT COUNT(*) FROM complaint,employee_complaint 
    WHERE employee_complaint.employee_id = ".$userID." AND complaint.id = employee_complaint.complaint_id";
    $result = mysqli_query($connection,$total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);

    $sql = "SELECT * FROM complaint,employee_complaint 
    WHERE employee_complaint.employee_id = ".$userID." AND complaint.id = employee_complaint.complaint_id LIMIT $offset, $no_of_records_per_page";
    $res_data = mysqli_query($connection,$sql);
  }
  else{
    $total_pages_sql = "SELECT COUNT(*) FROM complaint WHERE status = 1 ";
    $result = mysqli_query($connection,$total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);

    $sql = "SELECT * FROM complaint WHERE status = 1 LIMIT $offset, $no_of_records_per_page";
    $res_data = mysqli_query($connection,$sql);
  }

  if ($total_rows > 0) {
    include ("complaint_fetcher.php");
  }
  else{
      echo '<div class=container>
              <h2>Δεν υπάρχουν εκκρεμής καταγγελίες</h2>
            </div>';
  }
 
  include ("employee_pagination.php");
?>

</body>
</HTML>