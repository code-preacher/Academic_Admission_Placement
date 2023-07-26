<?php session_start(); ?>
<?php if (isset($_SESSION['allow']) && isset($_SESSION['admin'])):
  include '../db/db.php';
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
  $db->close();
?>
	<!doctype html>
	<html lang="en">
	<head>
		<meta charset="utf-8" />
		<link rel="icon" type="image/png" href="assets/img/favicon.ico">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>Admission Placement Recommender System</title>

		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	    <meta name="viewport" content="width=device-width" />
	    <!-- Bootstrap core CSS     -->
	    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	    <!-- Animation library for notifications   -->
	    <link href="assets/css/animate.min.css" rel="stylesheet"/>
	    <!--  Light Bootstrap Table core CSS    -->
	    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
	    <!--  CSS for Demo Purpose, don't include it in your project     -->
	    <link href="assets/css/demo.css" rel="stylesheet" />
	    <!--     Fonts and icons     -->
	    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
	    <link href="assets/css/font-awesome.css" rel="stylesheet">
	</head>
	<body>

	<div class="wrapper">
	    <div class="sidebar" data-color="black" data-image="assets/img/sidebar-5.jpg">

	    <!--

	        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
	        Tip 2: you can also add an image using data-image tag

	    -->

	    	<div class="sidebar-wrapper">
	            <div class="logo">
	                <a href="http://www.creative-tim.com" class="simple-text">
	                    <?php echo $_SESSION['admin']; ?>
	                </a>
	            </div>

	            <ul class="nav">
	                <li class="">
	                    <a href="./home.php">
	                        <i class="pe-7s-graph"></i>
	                        <p>Home</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="view-schools.php">
	                        <i class="pe-7s-home"></i>
	                        <p>View schools</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="view-courses.php">
	                        <i class="pe-7s-note2"></i>
	                        <p>View Courses</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="add-school.php">
	                        <i class="pe-7s-plus"></i>
	                        <p>Add School</p>
	                    </a>
	                </li>
	                <li class="active">
	                    <a href="add-course.php">
	                        <i class="pe-7s-plus"></i>
	                        <p>Add Course</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="logout.php">
	                        <i class="pe-7s-unlock"></i>
	                        <p>Logout</p>
	                    </a>
	                </li>
	            </ul>
	    	</div>
	    </div>

	    <div class="main-panel">
	        <nav class="navbar navbar-default navbar-fixed">
	            <div class="container-fluid">
	                <div class="navbar-header">
	                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
	                        <span class="sr-only">Toggle navigation</span>
	                        <span class="icon-bar"></span>
	                        <span class="icon-bar"></span>
	                        <span class="icon-bar"></span>
	                    </button>

	                </div>
	                <div class="collapse navbar-collapse">
	                  <ul class="nav navbar-nav navbar-right">
	                    <li>
	                      <a href="logout.php">
	                          <p> <i class="pe-7s-unlock"></i> Log out</p>
	                      </a>
	                    </li>
					            <li class="separator hidden-lg"></li>
	                  </ul>
	              </div>
	            </div>
	        </nav>

	        <div class="content">
	            <div class="container-fluid">
	                <div class="row">
										<div class="col-md-12">
											<div class="card">
												<div class="header">
                          <h4 class="title text-center">ADD COURSE</h4>
												</div>
												<div class="content" style="padding-bottom:50px; padding-top:20px;">
                          <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                              <form class="" action="add-course-script.php" method="post" style="margin-bottom:20px;">
                                <div class="form-group">
                                  <label for="title">Title</label>
                                  <input class="form-control" type="text" name="title" value="" name="title" placeholder="Enter course title" required>
                                </div>
                                <div class="form-group">
                                  <label for="faculty">Faculty</label>
                                  <select class="form-control" name="faculty" required>
                                    <option value="">Select faculty</option>
                                    <option value="administration">Administration</option>
                                    <option value="Agriculture">Agriculture</option>
                                    <option value="Arts">Arts</option>
                                    <option value="Education">Education</option>
                                    <option value="Engineering">Engineering</option>
                                    <option value="Law">Law</option>
                                    <option value="Health Sciences">Health Sciences</option>
                                    <option value="Sciences">Sciences</option>
                                    <option value="Social Sciences">Social Sciences</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <button type="submit" name="add-c-btn" class="btn-primary btn-fill btn btn-md col-md-12">ADD</button>
                                </div>
                              </form>
                              <br>
                            </div>
                          </div>
												</div>
											</div>

										</div>
	                </div>
	            </div>
	        </div>


	        <footer class="footer">
	            <div class="container-fluid">
									<p class="copyright text-center">
					            &copy; <?php echo date('Y'); ?>
					        </p>
	            </div>
	        </footer>

	    </div>
	</div>


	</body>

	    <!--   Core JS Files   -->
	    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
		<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

		<!--  Charts Plugin -->
		<!--<script src="assets/js/chartist.min.js"></script>-->

	    <!--  Notifications Plugin    -->
	    <script src="assets/js/bootstrap-notify.js"></script>

	    <!--  Google Maps Plugin    -->
	    <!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>-->

	    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
		<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

		<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
		<script src="assets/js/demo.js"></script>
		<script type="text/javascript">
	    	$(document).ready(function(){

	        	demo.initChartist();

	        	$.notify({
	            	icon: 'pe-7s-user',
	            	message: "Welcome <b>Okube Emmanuel</b>."

	            },{
	                type: 'info',
	                timer: 4000
	            });
	    	});
		</script>
	</html>
<?php else:
	header("Location:logout.php");
	exit;
?>
<?php endif; ?>
