<?php session_start(); error_reporting(E_ALL); ini_set("display_errors","on"); ?>
<?php if (isset($_SESSION['allow']) && isset($_SESSION['admin'])):
	include '../db/db.php';
	include 'functions.php';

	#Get number of federal universities
	$no_fed = _count("universities","owned","federal", $db);

	#Get number of state universities
	$no_state = _count("universities","owned","state", $db);

	#Get number of private universities
	$no_pri = _count("universities","owned","private", $db);

	#Get number of Administrative courses
	$no_adm = _count("courses","faculty","administration", $db);

	#Get number of Agricultural courses
	$no_agr = _count("courses","faculty","agriculture", $db);

	#Get number of Art courses
	$no_art = _count("courses","faculty","arts", $db);

	#Get number of Education courses
	$no_edu = _count("courses","faculty","education", $db);

	#Get number of Engineering courses
	$no_eng = _count("courses","faculty","engineering", $db);

	#Get number of Administrative courses
	$no_law = _count("courses","faculty","law", $db);

	#Get number of health science courses
	$no_hlt = _count("courses","faculty","health sciences", $db);

	#Get number of Administrative courses
	$no_sci = _count("courses","faculty","sciences", $db);

	#Get number of Administrative courses
	$no_ssci = _count("courses","faculty","social sciences", $db);
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
	                <li class="active">
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
	                <li>
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

												</div>
												<div class="content">
													<table class="table table-bordered text-center">
														<thead>
															<tr>
																<td colspan="3"><b>INSTITUTIONS</b></td>
															</tr>
															<tr>
																<td>Federal Institutions</td>
																<td>State Institutions</td>
																<td>Private Institutions</td>
															</tr>
														</thead>
														<tr>
															<tbody>
																<td> <?php echo $no_fed; ?> </td>
																<td> <?php echo $no_state; ?> </td>
																<td> <?php echo $no_pri; ?> </td>
															</tbody>
														</tr>
													</table>
												</div>
											</div>

										</div>

										<div class="col-md-12">
											<div class="card">
												<div class="content">
													<table class="table table-bordered text-center">
														<thead>
															<tr>
																<td colspan="9"><b>COURSES</b></td>
															</tr>
															<tr>
																<td>Administration</td>
																<td>Agriculture</td>
																<td>Arts</td>
																<td>Education</td>
																<td>Engineering</td>
																<td>Law</td>
																<td>Health Sciences</td>
																<td>Sciences</td>
																<td>Social Sciences</td>
															</tr>
														</thead>
														<tr>
															<tbody>
																<td> <?php echo $no_adm ?> </td>
																<td> <?php echo $no_agr; ?> </td>
																<td> <?php echo $no_art; ?> </td>
																<td> <?php echo $no_edu; ?> </td>
																<td> <?php echo $no_eng; ?> </td>
																<td> <?php echo $no_law; ?> </td>
																<td> <?php echo $no_hlt; ?> </td>
																<td> <?php echo $no_sci; ?></td>
																<td> <?php echo $no_ssci; ?> </td>
															</tbody>
														</tr>
													</table>
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
	            	message: "Welcome <b>User</b>."

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
