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
    echo '<form action="employee/complaint_box.php" method="post">';
    echo '<input type="submit" name="Άνοιγμα καταγγελίας" value="Άνοιγμα καταγγελίας" class="btn btn-secondary" />';
    echo '<input type="hidden" id="complaintID" name="complaintID" value="'.$row['id'].'">';
	echo "</form>";
    echo '</div> <hr style="border-width: 2px;color: black;">';
}
mysqli_close($connection);

?>