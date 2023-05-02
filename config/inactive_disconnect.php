<?php

// Check if last activity was set
if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > 900) {
    // last request was more than 15 minutes ago
    session_unset(); // unset $_SESSION variable for the run-time
    session_destroy(); // destroy session data in storage
    header("Location: login.php"); // redirect to login page
  }
  $_SESSION['last_activity'] = time(); // update last activity time stamp 

?>