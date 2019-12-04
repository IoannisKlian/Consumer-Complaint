<?php
    
  // Get company name and category
  include("../connect.php");
  $company_name_query = "SELECT company_name, status FROM complaint WHERE id = '".$_SESSION['complaintID']."'";
  $result = mysqli_query($connection,$company_name_query);
  $complaint_navigation = mysqli_fetch_array($result);
?>

<div class="row" style="background-color: #B0F2F1; margin: auto; flex-grow: 1;">
  <div class="col-sm-4">

    <!-- Determine Category  -->
    <b><?php 
          if ($complaint_navigation["status"] == 0) {
            echo "Ανοιχτά / ";
          }
          else if ($complaint_navigation["status"] == 1) {
            echo "Eκκρεμή / ";
          }
          else if ($complaint_navigation["status"] == 2) {
            echo "Αρχειοθετημένα / ";
          }
          echo $complaint_navigation["company_name"];?>
    </b> 
  </div>  

  <!-- Empty Space -->
  <div class="col-sm-4"> 
  </div> 

  <!-- Button for First Tab -->
  <div class="col-sm-2" style="padding-right: 0;"> 

    <?php if (strpos( $_SERVER['PHP_SELF'], "complaint_box.php") !== false){ ?>

        <a class="btn btn-info" role="button" style="width: 100%; background-color: #f7f7f7; border: none; bottom: -6px; position: relative; color: black; z-index: 7;">Πληροφορίες</a> 

    <?php 
      } 
      else if (strpos( $_SERVER['PHP_SELF'], "log.php") !== false){ 
    ?>

        <a class="btn btn-info" role="button" href="complaint_box.php" style="width: 100%; color: white; border: none; bottom: -1px; position: relative; z-index: 7;">Πληροφορίες</a> 

    <?php } ?>

  </div> 

  <!-- Button of Second Tab -->
  <div class="col-sm-2" style="padding-right: 0; padding-left: 0;"> 
    <?php if (strpos( $_SERVER['PHP_SELF'], "log.php") !== false) { ?>

        <a class="btn btn-info" role="button" href="" style="width: 100%; background-color: #f7f7f7; border: none; bottom: -6px; position: relative; color: black; z-index: 8;">Αρχείο Καταγραφής</a> 

    <?php 
      } 
      else if (strpos( $_SERVER['PHP_SELF'], "complaint_box.php") !== false) { 
    ?>

        <a class="btn btn-info" role="button" href="log.php" style="width: 100%; color: white; border: none; bottom: -1px; position: relative; z-index: 8;">Αρχείο Καταγραφής</a> 
        
    <?php } ?>
  </div>
</div>