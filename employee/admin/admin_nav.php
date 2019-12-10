<?php

if (isset($_GET["admin_id"])) {
    $admin_id = $_GET["admin_id"];
  }
  else{
    $admin_id = 0;
  }
?>

<nav class="navbar navbar-expand-lg navbar-light bg-dark" style="padding-bottom: 0; margin-bottom: 0; border-top: solid; padding-top: 0; margin-top: 0;  padding-left: 0; margin-left: 0;">
  <div class="collapse navbar-collapse" id="navbarNavDropdown1" style="padding-top: 0; margin-top: 0;  padding-left: 0; margin-left: 0;">
    <ul class="navbar-nav nav-fill w-100" style="padding-top: 0; margin-top: 0;  padding-left: 0; margin-left: 0;">

      <!-- Add User -->
      <li class="nav-item" id="add-user" style="border-right: solid; padding-top: 0; margin-top: 0; padding-left: 0; margin-left: 0;">
        <a class="nav-link" style="color: white;"  href="?admin_id=0">Προσθήκη Χρήστη</a>
      </li>

      <!-- Remove User -->
      <li class="nav-item dropdown" id="remove-user" style="border-right: solid;  padding-top: 0; margin-top: 0;">
        <a class="nav-link" style="color: white;"  href="?admin_id=1">Διαγραφη Χρήστη</a>
      </li>
      <!-- Update User -->
      <li class="nav-item" id="update-user" style=" padding-top: 0; margin-top: 0;">
        <a class="nav-link" style="color: white;"  href="?admin_id=2">Ανανέωση Στοιχείων Χρήστη</a>
      </li>
    </ul>
  </div>
</nav>

<?php
if($admin_id == 0) 
  {
    ?> 
      <script type="text/javascript">
        $("#add-user").css("background-color", "black");
        $("#remove-user").css("background-color", "inherit");
        $("#update-user").css("background-color", "inherit");
      </script>
    <?php
  }
  elseif ($admin_id == 1) 
  {
    ?> 
      <script type="text/javascript">
        $("#add-user").css("background-color", "inherit");
        $("#remove-user").css("background-color", "black");
        $("#update-user").css("background-color", "inherit");
      </script>
    <?php
  }
  elseif ($admin_id == 2) 
  {
    ?> 
      <script type="text/javascript">
        $("#add-user").css("background-color", "inherit");
        $("#remove-user").css("background-color", "inherit");
        $("#update-user").css("background-color", "black");
      </script>
    <?php
  }
  ?>