<?php
  session_start();
  if (isset($_SESSION['allow']) && isset($_SESSION['admin'])) {
    if (isset($_POST['add-course'])) {
      include '../db/db.php';
      $course = $_POST['course'];
      $s1 = $_POST['subject1'];
      $sm1=mysqli_fetch_array(mysqli_query($db,"select name from subjects where id='$s1' "));
      $sn1=$sm1['name'];
      $s2 = $_POST['subject2'];
      $sm2=mysqli_fetch_array(mysqli_query($db,"select name from subjects where id='$s2' "));
      $sn2=$sm2['name'];
      $s3 = $_POST['subject3'];
      $sm3=mysqli_fetch_array(mysqli_query($db,"select name from subjects where id='$s3' "));
      $sn3=$sm3['name'];
      $s4 = $_POST['subject4'];
      $sm4=mysqli_fetch_array(mysqli_query($db,"select name from subjects where id='$s4' "));
      $sn4=$sm4['name'];
      $s5 = $_POST['subject5'];
      $sm5=mysqli_fetch_array(mysqli_query($db,"select name from subjects where id='$s5' "));
      $sn5=$sm5['name'];
      $sg1 = $_POST['sg1'];$sg2 = $_POST['sg2'];$sg3 = $_POST['sg3'];$sg4 = $_POST['sg4'];$sg5 = $_POST['sg5'];
      $jamb = $_POST['jamb'];
      $school = $_POST['school_id'];

      $q = $db->prepare("insert into school_courses (course_id, school_id, s1, sn1, sg1, s2, sn2, sg2, s3, sn3, sg3, s4, sn4, sg4, s5, sn5, sg5, jamb) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
      $q->bind_param('ssssssssssssssssss', $course, $school, $s1, $sn1, $sg1, $s2, $sn2, $sg2, $s3, $sn3, $sg3, $s4, $sn4, $sg4, $s5, $sn5, $sg5, $jamb);
      if ($q->execute()) {
        $q->close();
        $db->close();
        $_SESSION['msg'] = "Course added successfuly.";
        header("Location:view-school-courses.php?school_id=$school");
        exit;
      }
      else {
        $q->close();
        $db->close();
        $_SESSION['msg'] = "Course not added!, please try again.";
        header("Location:view-school.php?id=$school");
        exit;
      }
    }
    else {
      header("Location:./home.php");
      exit;
    }
  }
  else {
    header("Location:logout.php");
    exit;
  }

?>
