<?php
  session_start();
  if (isset($_POST['login'])) {
    include '../db/db.php';
    $username = $_POST['username'];
    $password = ($_POST['password']);

    $q = $db->prepare("select name from admin where username = ? and password = ?");
    $q->bind_param('ss', $username, $password);
    $q->execute();
    $q->store_result();
    $n = $q->num_rows;
    if ($n < 1) {
      $q->close();
      $db->close();
      $_SESSION['msg'] = "Invalid login credentials.";
      header('Location:./');
      exit;
    }
    else {
      $q->bind_result($name);
      $q->fetch();
      $q->close();
      $db->close();
      $_SESSION['allow'] = true;
      $_SESSION['admin'] = $name;
      header('Location:home.php');
      exit;
    }
  }
  else {
    header("Location:./");
    exit;
  }
?>
