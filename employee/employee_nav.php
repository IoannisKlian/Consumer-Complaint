<?php
  include("../connect.php");
  $total_pages_sql = "SELECT COUNT(*) FROM complaint WHERE status = 0";
  $result = mysqli_query($connection,$total_pages_sql);
  $total_rows_open = mysqli_fetch_array($result)[0];

  $total_pages_sql = "SELECT COUNT(*) FROM complaint WHERE status = 1";
  $result = mysqli_query($connection,$total_pages_sql);
  $total_rows_pending_all = mysqli_fetch_array($result)[0];

  $total_pages_sql = "SELECT COUNT(*) FROM complaint,employee_complaint 
                      WHERE employee_complaint.employee_id = ".$_SESSION['id']." AND complaint.id = employee_complaint.complaint_id";
    $result = mysqli_query($connection,$total_pages_sql);
    $total_rows_my_pending = mysqli_fetch_array($result)[0];

  $total_pages_sql = "SELECT COUNT(*) FROM complaint WHERE status = 2";
  $result = mysqli_query($connection,$total_pages_sql);
  $total_rows_closed = mysqli_fetch_array($result)[0];
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav nav-fill w-100">
      <li class="nav-item active" id="index" style="border-right: solid;  border-color: #a1f8ff;">
        <a class="nav-link" href="employeeIndex.php">Ανοιχτά <?php echo "(".$total_rows_open.")"; ?><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown" id="pending" style="border-right: solid; border-color: #a1f8ff;">
        <a class="nav-link dropdown-toggle" href="employeePending.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Εκκρεμή
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="employeePending.php?page_id=1">Τα δικά μου<?php echo "(".$total_rows_my_pending .")"; ?></a>
          <a class="dropdown-item" href="employeePending.php?page_id=2">Όλα<?php echo "(".$total_rows_pending_all.")"; ?></a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="archived" href="employeeArchived.php">Αρχειοθετημένα<?php echo "(".$total_rows_closed.")"; ?></a>
      </li>
      <li class="nav-item" style="text-align: right;">
        <a href="logout.php" class="btn btn-info btn-sm">
          <span class="glyphicon glyphicon-log-out"></span> Αποσύνδεση
        </a>
      </li>
    </ul>
  </div>
</nav>

        
