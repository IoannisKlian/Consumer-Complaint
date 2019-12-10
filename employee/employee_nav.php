<?php
  include("../../connect.php");

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
                      WHERE employee_complaint.employee_id = ".$_SESSION['id']." 
                      AND complaint.id = employee_complaint.complaint_id  
                      AND complaint.status = 1";
    $result = mysqli_query($connection,$total_pages_sql);
    $total_rows_my_pending = mysqli_fetch_array($result)[0];

  // Calculating for All pending except current employee's
  $total_pages_sql = "SELECT COUNT(*) FROM complaint,employee_complaint 
                      WHERE employee_complaint.employee_id != ".$_SESSION['id']." 
                      AND complaint.id = employee_complaint.complaint_id
                      AND complaint.status = 1";
    $result = mysqli_query($connection,$total_pages_sql);
    $total_rows_others_pending = mysqli_fetch_array($result)[0];

  // Calculating for closed complaints
  $total_pages_sql = "SELECT COUNT(*) FROM complaint WHERE status = 2";
  $result = mysqli_query($connection,$total_pages_sql);
  $total_rows_closed = mysqli_fetch_array($result)[0];
?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding-bottom: 0; margin-bottom: 0; padding-left: 0; margin-left: 0;">
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav nav-fill w-100">

      <!-- Open -->
      <li class="nav-item" id="index" style="border-right: solid;  border-color: #a1f8ff;">
        <a class="nav-link" id="employee-open" href="../complaint-list/?page_id=0">Ανοιχτά <?php echo "(".$total_rows_open.")"; ?></a>
      </li>

      <!-- Pending -->
      <li class="nav-item dropdown" id="pending" style="border-right: solid; border-color: #a1f8ff;">
        <a class="nav-link dropdown-toggle" href="../complaint-list/" id="employee-pending" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Εκκρεμή
        </a>

        <!-- Pending Subcategories -->
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

          <!-- Logged Employee's -->
          <a class="dropdown-item" href="../complaint-list/?page_id=1">Τα δικά μου<?php echo " (".$total_rows_my_pending .")"; ?></a>

          <!-- All -->
          <a class="dropdown-item" href="../complaint-list/?page_id=2">Όλα<?php echo " (".$total_rows_pending_all.")"; ?></a>

          <!-- All - Logged Employee's -->
          <a class="dropdown-item" href="../complaint-list/?page_id=3">Άλλων<?php echo " (".$total_rows_others_pending.")"; ?></a>
        </div>
      </li>
      <!-- Archived -->
      <li class="nav-item" id="archived">
        <a class="nav-link" id="employee-archived" href="../complaint-list/?page_id=4">Αρχειοθετημένα<?php echo " (".$total_rows_closed.")"; ?></a>
      </li>

      <?php if($_SESSION['id']==1){?>
          <li class="nav-item" style="border-left: solid; border-color: #a1f8ff;" id="admin_page">
            <a class="nav-link" id="admin" href="../admin/?page_id=5&&admin_id=0">Επεξεργασία χρηστών</a>
          </li>
      <?php } ?>

      <!-- Log Out Button and Employee Name -->
      <li class="nav-item" style="text-align: right;">
        <div class="btn"><?php echo $_SESSION["name"]?></div>       
        
        <a href="../logout.php" class="btn btn-info btn-sm btn-dark">
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
  if ($_SESSION['id']==1) {
    echo "<script>$('#admin').css('color', 'gray')</script>";
  }

  // Highlighting active page by checking the pageId

  // If on Open Category
  if ($_SESSION['pageID'] == 0) {
   echo "<script>$('#employee-open').css('color', 'white')</script>";
   echo "<script>$('#index').css('background-color', '#343a40')</script>";
  }

  // If on Pending Category
  else if ($_SESSION['pageID'] == 1 || $_SESSION['pageID'] == 2 || $_SESSION['pageID'] == 3) {
   echo "<script>$('#employee-pending').css('color', 'white')</script>";
   echo "<script>$('#pending').css('background-color', '#343a40')</script>";

  }

  // If on Archived Category
  else if ($_SESSION['pageID'] == 4) {
    echo "<script>$('#employee-archived').css('color', 'white')</script>";
    echo "<script>$('#archived').css('background-color', '#343a40')</script>"; 
  }

  //If admin configuration
  else if ($_SESSION['pageID'] == 5) {
    echo "<script>$('#admin').css('color', 'white')</script>";
    echo "<script>$('#admin_page').css('background-color', '#343a40')</script>"; 
  }


?>
