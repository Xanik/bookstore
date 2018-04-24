<?php

     session_start();

     include 'includes/db.php';

     include 'includes/functions.php';

     $input = $_GET['category_id'];

     delete($conn, $input);

     reDirect('view_category.php', '?Category successfully deleted');
?>