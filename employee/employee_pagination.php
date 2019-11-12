<ul class="pagination" style="position: relative; margin-top: 10%; left: 60%;">
    <li><a href="?pageno=1">First</a></li>
    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
    </li>
    <?php
      for ($i = 1; $i <= $total_pages; $i++) {
      echo "<li class=";
      if($pageno == $i){ echo 'disabled'; }
      echo "><a href="."?pageno=".$i.">".$i."</a></li>";
  } 
    ?>
    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
    </li>
    <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
</ul>