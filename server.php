<?php

    $servername = "localhost";
    $username = "root";
    $password ="";
    $dbname = "dashboard_db";

    //create Connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    //Check connection
    if (!$conn) {
        die("Connection failed" . mysqli_connect_error());
    } 
?>


<!-- reset id
 ALTER TABLE booking DROP id;
ALTER TABLE booking AUTO_INCREMENT = 1;
ALTER TABLE booking ADD id int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;
-->

<!-- reset id
 ALTER TABLE user DROP ID;
ALTER TABLE user AUTO_INCREMENT = 1;
ALTER TABLE user ADD ID int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;
-->
<!-- reset id
ALTER TABLE updatemenu_set AUTO_INCREMENT=100;
-->