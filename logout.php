<?php
  $servername = "127.0.0.1";
  $username = "root";
  $password = "";
  $dbname = "ecommerce";
  
  $conn = new mysqli($servername, $username, $password, $dbname);
  session_start();
  session_unset();
  session_destroy();
  header("Location: index.php");
  exit;

?>