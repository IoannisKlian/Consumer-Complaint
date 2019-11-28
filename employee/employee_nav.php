<?php
  include("../connect.php");

  // Calculating total complaints for each category

  // Calculating for Open complaints
  $total_pages_sql = "SELECT COUNT(*) FROM complaint WHERE status = 0";
  $result = mysqli_query($connection,$total_pages_sql);
  $total_rows_open = mysqli_fetch_array($result)[0];

  //Calculating for All Pending Complaints
  $total_pages_sql = "SELECT COUNT(*) FROM complaint WHERE status = 1";
  $result = mysqli_query($connection,$total_pages_sql);
  $total_rows_pending_all = mysqli_fetch_array($result)[0];

  // Calculating for current employee's assigned pending compalaints
  $total_pages_sql = "SELECT COUNT(*) FROM complaint,employee_complaint 
                      WHERE employee_complaint.employee_id = ".$_SESSION['id']." AND complaint.id = employee_complaint.complaint_id";
    $result = mysqli_query($connection,$total_pages_sql);
    $total_rows_my_pending = mysqli_fetch_array($result)[0];

  // Calculating for All pending except current employee's
  $total_pages_sql = "SELECT COUNT(*) FROM complaint,employee_complaint 
                      WHERE employee_complaint.employee_id != ".$_SESSION['id']." AND complaint.id = employee_complaint.complaint_id";
    $result = mysqli_query($connection,$total_pages_sql);
    $total_rows_others_pending = mysqli_fetch_array($result)[0];

  // Calculating for closed complaints
  $total_pages_sql = "SELECT COUNT(*) FROM complaint WHERE status = 2";
  $result = mysqli_query($connection,$total_pages_sql);
  $total_rows_closed = mysqli_fetch_array($result)[0];
?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding-bottom: 0; margin-bottom: 0;">
  <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav nav-fill w-100">
      <li class="nav-item active" id="index" style="border-right: solid;  border-color: #a1f8ff;">
        <a class="nav-link" id="employee-open" href="employee_index.php?page_id=0">Ανοιχτά <?php echo "(".$total_rows_open.")"; ?><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown" id="pending" style="border-right: solid; border-color: #a1f8ff;">
        <a class="nav-link dropdown-toggle" href="employee_index.php" id="employee-pending" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Εκκρεμή
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="employee_index.php?page_id=1">Τα δικά μου<?php echo " (".$total_rows_my_pending .")"; ?></a>
          <a class="dropdown-item" href="employee_index.php?page_id=2">Όλα<?php echo " (".$total_rows_pending_all.")"; ?></a>
          <a class="dropdown-item" href="employee_index.php?page_id=3">Άλλων<?php echo " (".$total_rows_others_pending.")"; ?></a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="employee-archived" href="employee_index.php?page_id=4.php">Αρχειοθετημένα<?php echo " (".$total_rows_closed.")"; ?></a>
      </li>
      <li class="nav-item" style="text-align: right;">
        <a href="logout.php" class="btn btn-info btn-sm">
          <span class="glyphicon glyphicon-log-out"></span> Αποσύνδεση
        </a>
      </li>
    </ul>
  </div>
</nav>

<?php 
  
  // Reseting Navigation Colors
  echo "<script>$('#employee-open').css('color', 'gray')</script>";
  echo "<script>$('#employee-pending').css('color', 'gray')</script>";
  echo "<script>$('#employee-archived').css('color', 'gray')</script>";

  // Highlighting active page by checking the pageId

  // If on Open Category
  if ($_SESSION['pageID'] == 0) {
   echo "<script>$('#employee-open').css('color', 'black')</script>";
  }

  // If on Pending Category
  else if ($_SESSION['pageID'] == 1 || $_SESSION['pageID'] == 2) {
   echo "<script>$('#employee-pending').css('color', 'black')</script>"; 
  }

  // If on Archived Category
  else if ($_SESSION['pageID'] == 3) {
    echo "<script>$('#employee-archived').css('color', 'black')</script>"; 
  }

?>
