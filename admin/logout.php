<?php
  session_start();
  if (isset($_SESSION['allow'])) {
    unset($_SESSION['allow']);
  }
  if (isset($_SESSION['admin'])) {
    unset($_SESSION['admin']);
  }
  header("Location:./index.php");
  exit;
?>
