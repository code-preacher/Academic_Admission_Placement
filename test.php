
<?php 
  include 'db/db.php';
$c1=2;$c2=3;$c3=4;$c4=5;$c5=26;
$tq=(mysqli_query($db,"select course_id,school_id,s1,s2,s3,s4,s5,sg1,sg2,sg3,sg4,sg5,sn1,sn2,sn3,sn4,sn5,jamb from school_courses where (s1='$c1' or s2='$c1' or s3='$c1'or s4='$c1' or s5='$c1') and (s1='$c2' or s2='$c2' or s3='$c2' or s4='$c2' or s5='$c2') and (s1='$c3' or s2='$c3' or s3='$c3' or s4='$c3' or s5='$c3')and (s1='$c4' or s2='$c4' or s3='$c4' or s4='$c4' or s5='$c4')and (s1='$c5' or s2='$c5' or s3='$c5' or s4='$c5' or s5='$c5')"));
$r=0;
if (mysqli_num_rows($tq)>0) {
while ($t=mysqli_fetch_array($tq)) {
  $r++;
echo $r.")".$t['course_id']."--".$t['school_id']."<br>";
$h=mysqli_fetch_array(mysqli_query($db,"select name from courses where id='".$t['course_id']."' "));

$g=mysqli_fetch_array(mysqli_query($db,"select name from universities where id='".$t['school_id']."' "));
 echo $h['name'].'|'.$g['name'].'Subject Requirement'.$t['sn1'].$t['sg1'].$t['sn2'].$t['sg2'].$t['sn3'].$t['sg3'].$t['sn4'].$t['sg4'].$t['sn5'].$t['sg5'].'Jamb score'.$t['jamb'].'and above'.'<br>';
}

} else {
  echo "Requirement for our courses is not met";
}


//$tq=(mysqli_query($db,"select course_id,school_id,s1,s2,s3,s4,s5 from school_courses where (s1='$c1' or s2='$c1' or s3='$c1'or s4='$c1' or s5='$c1') and (s1='$c2' or s2='$c2' or s3='$c2' or s4='$c2' or s5='$c2') and (s1='$c3' or s2='$c3' or s3='$c3' or s4='$c3' or s5='$c3')and (s1='$c4' or s2='$c4' or s3='$c4' or s4='$c4' or s5='$c4')and (s1='$c5' or s2='$c5' or s3='$c5' or s4='$c5' or s5='$c5') and jamb>=180"));

//$tq=(mysqli_query($db,"select school_courses.course_id,school_courses.school_id,school_courses.s1,school_courses.s2,school_courses.s3,school_courses.s4,school_courses.s5,courses.id,courses.name from school_courses,courses where (s1='$c1' or s2='$c1' or s3='$c1'or s4='$c1' or s5='$c1') and (s1='$c2' or s2='$c2' or s3='$c2' or s4='$c2' or s5='$c2') and (s1='$c3' or s2='$c3' or s3='$c3' or s4='$c3' or s5='$c3')and (s1='$c4' or s2='$c4' or s3='$c4' or s4='$c4' or s5='$c4')and (s1='$c5' or s2='$c5' or s3='$c5' or s4='$c5' or s5='$c5') and jamb>=180"));

//((s1='$c1') and sg1 >='$s1');

?>