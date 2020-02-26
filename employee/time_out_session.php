<?php

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
    session_start();
    $_SESSION['errorinput'] = 2;
    header("Location: login.php");
}
$_SESSION['LAST_ACTIVITY'] = time(); 


?>