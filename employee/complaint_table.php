<table class="table table-hover">
    <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Ονομασία επιχείρησης</th>
      <th scope="col">Όνομα καταγγελέα</th>
      <th scope="col">Ημερομηνία καταβολής</th>
      <th scope="col">Αναλήφθηκε απο</th>

      <!-- Sorting button -->
      <th scope="col" style="text-align: right;">
        <button class="nav-link dropdown-toggle btn btn-dark" id="sort_button" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 0; text-align: right; float: right;">
          Ταξινόμηση
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <?php 
          echo '<a class="dropdown-item" href="employee_index.php?page_id='.$_SESSION['pageID'].'&sort_by=id ASC">Νεότερα</a>
                <a class="dropdown-item" href="employee_index.php?page_id='.$_SESSION['pageID'].'&sort_by=id DESC">Παλαιότερα</a>
                <a class="dropdown-item" href="employee_index.php?page_id='.$_SESSION['pageID'].'&sort_by=username ASC">Ανα Υπάλληλο (Αυξουσα Σειρά)
                <a class="dropdown-item" href="employee_index.php?page_id='.$_SESSION['pageID'].'&sort_by=username DESC">Ανα Υπάλληλο (Φθήνουσα Σειρά)
                </a>'; 
          ?>
        </div>
      </th>
      <!--  -->
    </tr>
  </thead>
  <tbody>

    <?php 
      $counter = 0;

      while($row = mysqli_fetch_array($res_data)){
            $counter++;
        if (strcmp( "empty", $row['name'] ) == 0) {
          $nameOfComplainer = "-";
        }
        else{
          $nameOfComplainer = $row['name'];
        }

        if (!isset($row['username'])) {
          $row['username'] = "-";
        }
       echo' <tr>
          <th scope="row">'.$counter.'</th>
          <td>'.$row["company_name"].'</td>
          <td>'.$nameOfComplainer.'</td>
          <td>'.$row['subdate'].'</td>
          <td>'.$row['username'].'</td>
          <td><form action="complaint_box.php" method="post"  style="text-align: right;">
            <input type="submit" name="Άνοιγμα καταγγελίας" value="Άνοιγμα καταγγελίας" class="btn btn-secondary" formtarget="_blank" />
            <input type="hidden" id="complaintID" name="complaintID" value="'.$row['id'].'">
            </form>
          </td>
        </tr>';
        
    }
    mysqli_close($connection);
    ?>
  </tbody>
</table>