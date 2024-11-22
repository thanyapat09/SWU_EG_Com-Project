<?php

   $db_name = "mysql:host=localhost;dbname=dashboard_db";
   $username = "root";
   $password = "";

   $con = new PDO($db_name, $username, $password);
   
   if (!$con) {
      die("Connection failed" . mysqli_connect_error());
  } 

?>