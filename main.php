
<?php

session_start();

  include 'db/db.php';

  $q = $db->prepare("select id, name from subjects order by name");
  $q->execute();
  $q->bind_result($id,$subject);
  $i = 0;
  $subjects = array();
  while ($q->fetch()) {
    $subjects["$subject"] = $id;
    $i++;
  }
  $q->close();

  $q = $db->prepare("select id, name from courses order by name asc");
  $q->execute();
  $q->store_result();
  $q->bind_result($course_id, $course_name);

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


    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<!--<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script> -->
  <script language="javascript" type="text/javascript" src="jquery/jquery-1.11.0.min.js"></script>
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css  -->
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
                    <h3 class="text-primary">Check</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="index.php">Back to Home <i class="fa fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Check</a></li>
                        <li class="breadcrumb-item active">Admission Placement System</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                <div class="col-md-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>SELECT ALL YOUR O'LEVEL SUBJECTS </h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="result.php" method="POST">
                                       
 <div class="Container"><div class="row">                                    
<div class="col-md-4">
 <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Subject 1 :</p>
                                            <select id="select1" class="form-control input-rounded" name="c1"  required="required">
                                             <option value="">--------Select Subject one--------</option>
                                             <?php foreach ($subjects as $key => $value): ?>
                                              <option value="<?php echo $value; ?>"><?php echo $key; ?></option>
                                                 <?php endforeach; ?>
                                                 </select>
                                        </div>
</div>


<div class="col-md-4">
          <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Subject 2 :</p>
                                             <select id="select2" class="form-control input-rounded" name="c2"  required="required">
                                             <option value="">--------Select Subject one--------</option>
                                             <?php foreach ($subjects as $key => $value): ?>
                                              <option value="<?php echo $value; ?>"><?php echo $key; ?></option>
                                                 <?php endforeach; ?>
                                                 </select>
     </div> </div>


<div class="col-md-4">
 <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Subject 3 :</p>
                                           <select id="select3" class="form-control input-rounded" name="c3"  required="required">
                                             <option value="">--------Select Subject three--------</option>
                                             <?php foreach ($subjects as $key => $value): ?>
                                              <option value="<?php echo $value; ?>"><?php echo $key; ?></option>
                                                 <?php endforeach; ?>
                                                 </select>
                                        </div></div>

 <div class="col-md-4">
 <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Subject 4 :</p>
                                             <select id="select4" class="form-control input-rounded" name="c4"  required="required">
                                             <option value="">--------Select Subject four--------</option>
                                             <?php foreach ($subjects as $key => $value): ?>
                                              <option value="<?php echo $value; ?>"><?php echo $key; ?></option>
                                                 <?php endforeach; ?>
                                                 </select>
                                        </div></div>                                       

<div class="col-md-4">
 <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Subject 5 :</p>
                                             <select id="select5" class="form-control input-rounded" name="c5"  required="required">
                                             <option value="">--------Select Subject five--------</option>
                                             <?php foreach ($subjects as $key => $value): ?>
                                              <option value="<?php echo $value; ?>"><?php echo $key; ?></option>
                                                 <?php endforeach; ?>
                                                 </select>
                                        </div></div>
<div class="col-md-4">
 <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Subject 6 :</p>
                                             <select id="select6" class="form-control input-rounded" name="c6"  required="required">
                                             <option value="">--------Select Subject six--------</option>
                                             <?php foreach ($subjects as $key => $value): ?>
                                              <option value="<?php echo $value; ?>"><?php echo $key; ?></option>
                                                 <?php endforeach; ?>
                                                 </select>
                                        </div></div>

                                        <div class="col-md-4">
 <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Subject 7 :</p>
                                            <select id="select7" class="form-control input-rounded" name="c7"  required="required">
                                             <option value="">--------Select Subject seven--------</option>
                                             <?php foreach ($subjects as $key => $value): ?>
                                              <option value="<?php echo $value; ?>"><?php echo $key; ?></option>
                                                 <?php endforeach; ?>
                                                 </select>
                                        </div></div>                                       

<div class="col-md-4">
 <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Subject 8 :</p>
                                             <select id="select8" class="form-control input-rounded" name="c8"  required="required">
                                             <option value="">--------Select Subject eight--------</option>
                                             <?php foreach ($subjects as $key => $value): ?>
                                              <option value="<?php echo $value; ?>"><?php echo $key; ?></option>
                                                 <?php endforeach; ?>
                                                 </select>
                                        </div></div>
<div class="col-md-4">
 <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Subject 9 :</p>
                                             <select id="select9" class="form-control input-rounded" name="c9"  required="required">
                                             <option value="">--------Select Subject nine--------</option>
                                             <?php foreach ($subjects as $key => $value): ?>
                                              <option value="<?php echo $value; ?>"><?php echo $key; ?></option>
                                                 <?php endforeach; ?>
                                                 </select>
                                        </div></div>


</div></div>
                                        <br><center>
                                        <div class="form-actions">
                                        	
                                        <button type="submit" name="sub" class="btn btn-success col-md-5"> <i class="fa fa-check"></i> Check Admission Placement</button>
                                        <button type="reset" class="btn btn-inverse">Clear</button>
                                    </div>
                                </center>
                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- End PAge Content -->
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

      <script>
$(document).ready(function(){  
  $("select").change(function() {   
    $("select").not(this).find("option[value="+ $(this).val() + "]").attr('disabled', true);
  }); 
}); 
  </script>                       
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
    <!--Custom JavaScript -->
    <script src="js/scripts.js"></script>

</body>

</html>