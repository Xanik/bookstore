<?php

    define("DBNAME", "bookstore");
    define("DBUSER", "root");
    define("DBPASS", "4getmen0t");
    try{
    	$conn = new PDO("mysql:host=localhost;dbname=".DBNAME, DBUSER, DBPASS);

    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

    }catch(PDOException $e){

    	echo $e->getMessage();
    	
    }


?>