<?php
   $hostname  = "localhost";
   $username  = "root";
   $password  = "";
   $dbname  = "users";
   $db = new PDO('mysql:dbname='.$dbname.';host='.$hostname, $username, $password);
?>