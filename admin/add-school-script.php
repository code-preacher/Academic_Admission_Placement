<?php
  session_start();
  error_reporting(E_ALL);
  ini_set('display_errors','on');
  if (isset($_SESSION['allow']) && isset($_SESSION['admin'])) {
    if (isset($_POST['add-s-btn'])) {
      include '../db/db.php';
      $name = $_POST['name'];
      $owner = $_POST['type'];
      $state = $_POST['state'];
      $address = $_POST['address'];
      $web = $_POST['website'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];
      $email = $_POST['email'];

      $q = $db->prepare("insert into universities (name, owned, state, location, web, phone, email) values (?, ?, ?, ?, ?, ?, ?)");
      $q->bind_param('sssssss',$name, $owner, $state, $address, $web, $phone, $email);
      if ($q->execute()) {
        if ($owner == "Federal") {
          $q->close();
          $q = $db->prepare("select id from universities where name = ?");
          $q->bind_param('s',$name);
          $q->execute();
          $q->bind_result($school_id);
          $q->fetch();
          $q->close();

          $areas = $_POST['cachment_area'];
          $q = $db->prepare("insert into cachement_area (school_id, area) values (?, ?)");
          $cachment_areas = explode(' ',$areas);

          $q0 = $db->prepare('select id from cachement_area where school_id = ? and area = ?');
          $l = count($cachment_areas);
          for ($x = 0; $x < $l; $x++){
            $q0->bind_param('ss',$school_id,$cachment_areas[$x]);
            $q0->execute();
            $q0->store_result();
            $n = $q0->num_rows;
            if ($n < 1) {
              $q->bind_param('ss',$school_id,$cachment_areas[$x]);
              $q->execute();
            }
          }
          $q0->close();
        }
        $q->close();
        $db->close();
        $_SESSION['msg'] = "institution added successfuly.";
        header("Location:view-schools.php");
        exit;
      }
      else {
        $q->close();
        $db->close();
        $_SESSION['msg'] = "Problem adding school, please try again.";
        header("Location:add-school.php");
        exit;
      }
    } else {
      header("Location:./home.php");
      exit;
    }
  }
  else {
    header("Location:logout.php");
    exit;
  }
?>
