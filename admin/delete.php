<?php
  session_start();
  $jb=$_GET['j'];
  $cs=$_GET['c'];
  $id=$_GET['id'];
  include '../db/db.php';
  $r=mysqli_query($db,"select id from courses where name='$cs'");
  $rt=mysqli_fetch_array($r);
  $rid=$rt['id'];
 $ty=mysqli_query($db,"delete from school_courses where jamb='$jb' and course_id='$rid'");
 if ($ty) {
 $_SESSION['msg']= '<span style="color:white;">'."Course Data was successfully deleted".'</span>';
 header("location:view-school-courses.php?school_id=$id");
 } else {
 $_SESSION['msg']= '<span style="color:black;">'."Course Data was not successfully deleted".'</span>';
 header("location:view-school-courses.php?school_id=$id");
 }
 

?>