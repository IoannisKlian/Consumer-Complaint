<ul class="pagination" >
    <li><a class="page-link" href="?pageno=1">First</a></li>
    <li class="<?php if($pageno <= 1){ echo 'page-item disabled'; } ?>">
        <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
    </li>
    <?php
      for ($i = 1; $i <= $total_pages; $i++) {
        echo "<li class=";
        if($pageno == $i){ echo '"'.'page-item disabled'.'"'; }
        echo '><a class="page-link" href="?pageno='.$i.'">'.$i.'</a></li>';
      } 
    ?>
    <li class="<?php if($pageno >= $total_pages){ echo 'page-item disabled'; } ?>">
        <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
    </li>
    <li><a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
</ul>
