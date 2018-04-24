<?php

   include 'includes/db.php';

   include 'includes/functions.php';
 
   $data['book_id'] = $_GET['book_id'];

   deleteBooks($conn, $data);

   reDirect("view_books.php", "?Book deleted successfully");

?>