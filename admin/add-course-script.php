<?php
  session_start();
  if (isset($_SESSION['allow']) && isset($_SESSION['admin'])) {
    if (isset($_POST['add-c-btn'])) {
      include '../db/db.php';
      $course_title = $_POST['title'];
      $faculty = $_POST['faculty'];

      $q = $db->prepare("insert into courses (name, faculty) values (?, ?)");
      $q->bind_param('ss',$course_title, $faculty);
      if ($q->execute()) {
        $_SESSION['msg'] = "Course added successfuly.";
        header("Location:view-courses.php");
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
