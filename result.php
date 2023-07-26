
<?php
session_start();
include 'db/db.php';


 print "<script>
    swal({
          title: 'User error!',
          text: 'Invalid Login Credentials!!!',
          type: 'error',
          showCancelButton: false,
          confirmButtonClass: 'btn-danger',
          confirmButtonText: 'OK'
        });
    </script>";

if (isset($_POST['sub'])) {

$c1=$_POST['c1'];
$c2=$_POST['c2'];
$c3=$_POST['c3'];
$c4=$_POST['c4'];
$c5=$_POST['c5'];
$c6=$_POST['c6'];
$c7=$_POST['c7'];
$c8=$_POST['c8'];
$c9=$_POST['c9'];
}


$tq=(mysqli_query($db,"select course_id,school_id,s1,s2,s3,s4,s5,sg1,sg2,sg3,sg4,sg5,sn1,sn2,sn3,sn4,sn5,jamb from school_courses where (s1='$c1' or s1='$c2' or s1='$c3'or s1='$c4' or s1='$c5' or s1='$c6' or s1='$c7' or s1='$c8' or s1='$c9') and (s2='$c1' or s2='$c2' or s2='$c3'or s2='$c4' or s2='$c5' or s2='$c6' or s2='$c7' or s2='$c8' or s2='$c9') and (s3='$c1' or s3='$c2' or s3='$c3'or s3='$c4' or s3='$c5' or s3='$c6' or s3='$c7' or s3='$c8' or s3='$c9') and (s4='$c1' or s4='$c2' or s4='$c3'or s4='$c4' or s4='$c5' or s4='$c6' or s4='$c7' or s4='$c8' or s4='$c9') and (s5='$c1' or s5='$c2' or s5='$c3'or s5='$c4' or s5='$c5' or s5='$c6' or s5='$c7' or s5='$c8' or s5='$c9')"));



?>


<!DOCTYPE html>
<html lang="en">

<head>
  
    <!-- important meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title -->
    <title> ADMISSION PLACEMENT SYSTEM</title>
    
    <!-- Basic SEO -->
     <meta name="description" content="ADMISSION PLACEMENT SYSTEM ">
    <meta name="keywords" content="ADMISSION PLACEMENT SYSTEM ">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="img/">
 
   
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->

    <link href="css/lib/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
   <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>



    <!-- Main wrapper  -->
    <div id="main-wrapper">
     
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="col-lg-12">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Result</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="index.php">Back to Home <i class="fa fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">View Result</a></li>
                        <li class="breadcrumb-item active">Admission Placement System</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
               

                    <!-- /# column -->
                    <div class="col-lg-12">
                        <div class="card">
                             
                            <div class="card-title">
                                <h4>RESULT

                                </h4>
                       
                            </div>
                            <div class="card-body">
                                <?php
                                if (mysqli_num_rows($tq)<1) {
                                    echo "<center><h1>Requirement for our courses is not met</h1></center>";
                                }else{

                                ?>
                                <div class="table-responsive">

                                   
                                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
         

                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>University</th>
                                                <th>Faculty</th>
                                                <th>Course</th>
                                                <th>Subject Requirements</th>
                                                <th>Jamb Score</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
$r=0;

while ($t=mysqli_fetch_array($tq)) {
  $r++;
$h=mysqli_fetch_array(mysqli_query($db,"select faculty,name from courses where id='".$t['course_id']."' "));

$g=mysqli_fetch_array(mysqli_query($db,"select name from universities where id='".$t['school_id']."' "));

?>
                                                <tr>
                                                <td><?php echo $r;?></td>
                                                <td><?php echo $g['name'];?></td>
                                                <td><?php echo $h['faculty'];?></td>
                                                 <td><?php echo $h['name'];?></td>
                                                  <td><?php echo $t['sn1'].':'.$t['sg1'].'<br>'.$t['sn2'].':'.$t['sg2'].'<br>'.$t['sn3'].':'.$t['sg3'].'<br>'.$t['sn4'].':'.$t['sg4'].'<br>'.$t['sn5'].':'.$t['sg5'];?></td>
                                                  <td><?php echo $t['jamb'].' and above';?></td>
                                              </tr>

                                           <?php }  } ?>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                    </script>


              
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->

            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
     <div class="col-md-12 text-center" style="color: #000;">
                                &copy; <?php echo date('Y'); ?>.ADMISSION PLACEMENT SYSTEM! All rights reserved.
                            </div><!-- /.col-md-12 -->
    <!-- All Jquery -->
       <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>

    <script src="js/lib/sweetalert/sweetalert.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/sweetalert/sweetalert.init.js"></script>
    <!--Custom JavaScript -->
    <script src="js/scripts.js"></script>


    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>

</body>

</html>
