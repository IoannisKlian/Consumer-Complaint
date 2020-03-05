<?php
  include ("../time_out_session.php");
  if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
  }

  // Get company name and category
  include("../../connect.php");
  $company_name_query = "SELECT company_name, status FROM complaint WHERE id = '".$_SESSION['complaintID']."'";
  $result = mysqli_query($connection,$company_name_query);
  $complaint_navigation = mysqli_fetch_array($result);
?>

<div class="row bg-dark" style="margin: auto; flex-grow: 1;">
  <div class="col-sm-4 btn" style="text-align: left;">

    <!-- Determine Category  -->
    <b style="color: white"><?php 
          if ($complaint_navigation["status"] == 0) {
            echo "Μη αναληφθείσες / ";
          }
          else if ($complaint_navigation["status"] == 1) {
            echo "Ενεργές / ";
          }
          else if ($complaint_navigation["status"] == 2) {
            echo "Κλειστές / ";
          }
          echo $complaint_navigation["company_name"];?>
    </b> 
  </div>  

  <!-- Empty Space -->
  <div class="col-sm-4"> 
  </div> 

  <!-- Button for First Tab -->
  <div class="col-sm-2" style="padding-right: 0; padding-left: 0;"> 

    <?php if (current_page("index.php")){ ?>

        <a class="btn" role="button" style="width: 100%; background-color: #f7f7f7; border: none; bottom: -6px; position: relative; color: black; z-index: 7;">Πληροφορίες</a> 

    <?php 
      } 
      else if (current_page("log.php")){ 
    ?>

        <a class="btn" role="button" href="./" style="width: 100%; color: white; border: none; bottom: -1px; position: relative; z-index: 7;">Πληροφορίες</a> 

    <?php } ?>

  </div> 

  <!-- Button of Second Tab -->
  <div class="col-sm-2" style="padding-right: 0; padding-left: 0;"> 
    <?php if (current_page("log.php")) { ?>

        <a class="btn" role="button" href="" style="width: 100%; background-color: #f7f7f7; border: none; bottom: -6px; position: relative; color: black; z-index: 8;">Αρχείο Καταγραφής</a> 

    <?php 
      } 
      else if (current_page("index.php") && !complaint_is_open($complaint_navigation["status"]) && employee_is_assigned_or_admin()) { 
    ?>

        <a class="btn" role="button" href="log.php" style="width: 100%; color: white; border: none; bottom: -1px; position: relative; z-index: 8;">Αρχείο Καταγραφής</a> 
        
    <?php } ?>
  </div>
</div>


<?php 

  function current_page ($name) 
  {
    return strpos( $_SERVER['PHP_SELF'], $name) !== false;
  }

  function complaint_is_open ($status) 
  {
    return $status == 0;
  }

  function employee_is_assigned_or_admin () {
    include("../../connect.php");

    $assigned_user_query = "SELECT COUNT(*) FROM employee_complaint 
                            WHERE employee_id = '".$_SESSION['user_id']."' 
                            AND complaint_id = '".$_SESSION['complaintID']."'";
    $result = mysqli_query($connection,$assigned_user_query);
    $total_rows = mysqli_fetch_array($result)[0];


    return $total_rows != 0 || $_SESSION['admin'] == 1;

  }

?>