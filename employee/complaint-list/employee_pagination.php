<?php
include ("../time_out_session.php");
  if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
  }

?>

<ul class="pagination justify-content-end" style="position: relative; margin: auto auto; bottom: -15px;">
    <li><a class="page-link" href="?pageno=1">Πρώτο</a></li>
    <li class="<?php if($pageno <= 1){ echo 'page-item disabled'; } ?>">
        <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Προηγούμενο</a>
    </li>
    <?php
      for ($i = 1; $i <= $total_pages; $i++) {
        echo "<li class=";
        if($pageno == $i){ echo '"'.'page-item disabled'.'"'; }
        echo '><a class="page-link" href="?pageno='.$i.'">'.$i.'</a></li>';
      } 
    ?>
    <li class="<?php if($pageno >= $total_pages){ echo 'page-item disabled'; } ?>">
        <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Επόμενο</a>
    </li>
    <li><a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Τελευταίο</a></li>
</ul>


<script type="text/javascript">
    
    $( document ).ready(function() {
        // $(".pagination").css("left", $(window).width());
    });
</script>