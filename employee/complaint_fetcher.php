<?php while($row = mysqli_fetch_array($res_data)){

    echo "<div class="."container".">";
    echo "<h3>"."Ονομασία επιχείρησης: ".$row['company_name']."</h3>";
    if (strcmp( "empty", $row['name'] ) == 0) {
      $nameOfComplainer = "-";
    }
    else{
      $nameOfComplainer = $row['name'];
    }
    echo "<h5>"."Όνομα καταγγελέα: ".$nameOfComplainer."</h5>";
    echo "<h5>"."Ημερομηνία καταβολής: ".$row['datetime']."</h5>";
    
    echo '<button type="button" class="btn btn-secondary"'.'>Open Form</button>';

    echo '</div> <hr style="border-width: 2px;color: black;">';
}
mysqli_close($connection);

?>