<?php
        $host = "db";
        $dbname ="form_db";
        $hostusername = "docker";
        $hostpassword = "password";

        // create connection to mysql
        $conn = mysqli_connect($host,  $hostusername, $hostpassword, $dbname, 3306);

        // Check connection
        if (mysqli_connect_errno()) {
         die("connection error:  " . mysqli_connect_errno());
        }

?>