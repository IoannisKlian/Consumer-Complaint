<?php
include ("../time_out_session.php");
  if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
  }

?>

<table class="table table-hover">
    <thead class="thead-dark">
    <tr>
      <th scope="col">Αριθμός καταγγελίας</th>
      <th scope="col">Καταγγελόμενη επιχείρηση</th>
      <th scope="col">Στοιχεία καταναλωτή</th>
      <th scope="col">Ημερομηνία υποβολής</th>
      <th scope="col">Αναλήφθηκε από</th>

      <!-- Sorting button -->
      <th scope="col" style="text-align: right;">
        <button class="nav-link dropdown-toggle btn btn-dark" id="sort_button" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 0; text-align: right; float: right;">
          Ταξινόμηση
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <?php 

          echo '<a class="dropdown-item" href="?page_id='.$_SESSION['pageID'].'&sort_by=id DESC">Νεότερα</a>
                <a class="dropdown-item" href="?page_id='.$_SESSION['pageID'].'&sort_by=id ASC">Παλαιότερα</a>'; 
          if ($_SESSION['pageID'] != 0) {
            echo '<a class="dropdown-item" href="?page_id='.$_SESSION['pageID'].'&sort_by=name ASC">Ανα Υπάλληλο (Αυξουσα Σειρά)
                  <a class="dropdown-item" href="?page_id='.$_SESSION['pageID'].'&sort_by=name DESC">Ανα Υπάλληλο (Φθήνουσα Σειρά)
                  </a>'; 
          }

          ?>
        </div>
      </th>
      <!--  -->
    </tr>
  </thead>
  <tbody>

    <?php 
      while($row = mysqli_fetch_array($res_data)){
        if (strcmp( "empty", $row['complainant_name'] ) == 0) {
          $nameOfComplainer = "-";
        }
        else{
          $nameOfComplainer = $row['complainant_name'];
        }

        if (!isset($row['name'])) {
          $row['name'] = "-";
        }
       echo' <tr>
          <th scope="row">'.$row['id'].'</th>
          <td>'.$row["company_name"].'</td>
          <td>'.$nameOfComplainer.'</td>
          <td>'.$row['subdate'].'</td>
          <td>'.$row['name'].'</td>
          <td ><form action="../complaint-box/" method="post"  style="text-align: right;">
            <input type="submit" name="Άνοιγμα καταγγελίας" value="Προβολή καταγγελίας" class="btn btn-secondary" />
            <input type="hidden" id="complaintID" name="complaintID" value="'.$row['id'].'">
            </form>
          </td>
        </tr>';
        
    }
    mysqli_close($connection);
    ?>
  </tbody>
</table>