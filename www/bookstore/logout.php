<?php
     
     session_start();

     include 'includes/db.php';

     include 'includes/functions.php';

     include 'includes/dash_header.php';

      logout();

      reDirect("adminlogin.php", '?Please login');
?>