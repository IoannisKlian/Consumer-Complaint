<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav nav-fill w-100">
      <li class="nav-item active" id="index" style="border-right: solid;  border-color: #a1f8ff;">
        <a class="nav-link" href="employeeIndex.php">Ανοιχτά<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown" id="pending" style="border-right: solid; border-color: #a1f8ff;">
       <a class="nav-link dropdown-toggle" href="employeePending.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Εκκρεμή
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="employeePending.php?page_id=1">Τα δικά μου</a>
          <a class="dropdown-item" href="employeePending.php?page_id=2">Όλα</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="archived" href="employeeArchived.php">Αρχειοθετημένα</a>
      </li>
      <li class="nav-item" style="text-align: right;">
        <a href="logout.php" class="btn btn-info btn-sm">
          <span class="glyphicon glyphicon-log-out"></span> Αποσύνδεση
        </a>
      </li>
    </ul>
  </div>
</nav>

<!--<li class="nav-item dropdown" id="pending" style="border-right: solid; border-color: #a1f8ff;">
       <a class="nav-link dropdown-toggle" href="employeePending.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Εκκρεμή
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
        </div>
      </li>
      -->
