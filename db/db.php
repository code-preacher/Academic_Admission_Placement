<?php
  $host = 'localhost';
  $user = 'root';
  $password = '';
  $dbName = 'admission_placement';

  $db = new mysqli($host, $user, $password, $dbName);
  if ($db->connect_error != null) {
    echo "Error connecting to database";
    exit;
  }
?>
