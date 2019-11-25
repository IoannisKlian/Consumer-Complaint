<?php 
    echo '<table class="table table-striped">
    <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Ονομασία επιχείρησης</th>
      <th scope="col">Όνομα καταγγελέα</th>
      <th scope="col">Ημερομηνία καταβολής</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>';

  $counter = 0;

    while($row = mysqli_fetch_array($res_data)){
        $counter++;
    if (strcmp( "empty", $row['name'] ) == 0) {
      $nameOfComplainer = "-";
    }
    else{
      $nameOfComplainer = $row['name'];
    }
   echo' <tr>
      <th scope="row">'.$counter.'</th>
      <td>'.$row["company_name"].'</td>
      <td>'.$nameOfComplainer.'</td>
      <td>'.$row['datetime'].'</td>
      <td><form action="complaint_box.php" method="post">
        <input type="submit" name="Άνοιγμα καταγγελίας" value="Άνοιγμα καταγγελίας" class="btn btn-secondary" formtarget="_blank" />
        <input type="hidden" id="complaintID" name="complaintID" value="'.$row['id'].'">
        </form>
      </td>
    </tr>';
    
}
echo '</tbody>
</table>';
mysqli_close($connection);

?>