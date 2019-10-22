<?php
session_start();
  if (!isset($_SESSION['user']) || $_SESSION['user'] == false) {
      header("Location: login.php");
  }
?>

<HTML>
<body>
<?php echo  $_SESSION['name']; ?>


</body>
</HTML>