<?php session_start(); ?>
<?php if (isset($_SESSION['allow']) && isset($_SESSION['admin'])):
  include '../db/db.php';
  $q = $db->prepare("select name from states");
  $q->execute();
  $q->bind_result($state);
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
	                <li class="active">
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
											<div class="card" style="padding-bottom:20px;">
                        <?php if (isset($_SESSION['msg'])): ?>
                          <div class="alert alert-info text-center bold">
                            <?php echo $_SESSION['msg']; ?>
                          </div>
                        <?php endif; unset($_SESSION['msg']);?>
												<div class="header">
                          <h4 class="title text-center">ADD INSTITUTION</h4>
												</div>
												<div class="content">
                          <div class="row">
                            <div class="col-md-6 col-md-offset-1">
                              <form class="" action="add-school-script.php" method="post" style="margin-bottom:20px;" id="myform">
                                <div class="form-group">
                                  <label for="title">Name</label>
                                  <input class="form-control" type="text" name="name" value="" placeholder="Enter institution name" required>
                                </div>
                                <div class="row">
                                  <div class="col-md-7">
                                    <div class="form-group">
                                      <label for="type">Type</label>
                                      <select id="select1" class="form-control" name="type" required onclick="control('cach','list','select1','cachment_div')">
                                        <option value="">Select type</option>
                                        <option value="Federal">Federal</option>
                                        <option value="State">State</option>
                                        <option value="Private">Private</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-5">
                                    <div class="form-group">
                                      <label for="state">State</label>
                                      <select class="form-control" name="state" required>
                                        <option value="">Select State</option>
                                        <?php while ($q->fetch()): ?>
                                          <option value="<?php echo $state; ?>"><?php echo $state; ?></option>
                                        <?php endwhile; ?>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group" id="cachment_div" style="display:none">
                                  <label for="state">Cachement Area</label>
                                  <select class="form-control" name="ca" id="select2" onchange="append('cach','select2')">
                                    <option value="">Select Cachement Areas</option>
                                    <?php
                                      $q->execute();
                                      $q->bind_result($state);
                                    ?>
                                    <?php while ($q->fetch()): ?>
                                      <option value="<?php echo $state; ?>"><?php echo $state; ?></option>
                                    <?php endwhile; $q->free_result(); $q->close(); $db->close(); ?>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="address">Address</label>
                                  <input type="text" name="address" value="" required class="form-control" placeholder="Enter institution address">
                                </div>
                                <div class="form-group">
                                  <label for="website">Website Address</label>
                                  <input class="form-control" type="url" name="website" value="" required placeholder="Enter institution address">
                                </div>
                                <div class="form-group">
                                  <label for="phone">Contact Phone</label>
                                  <input type="number" class="form-control" name="phone" placeholder="Enter institution phone number" value="" required>
                                </div>
                                <div class="form-group">
                                  <label for="email">Email Address</label>
                                  <input type="email" class="form-control" name="email" placeholder="Enter institution email" value="" required>
                                </div>
                                <div class="form-group">
                                  <input type="submit" name="add-s-btn" class="btn-primary btn-fill btn btn-md col-md-12" value="ADD">
                                </div>
                              </form>
                              <br>
                            </div>
                            <div class="col-md-5">
                              <div class="" id="cach" style="display:none">
                                <h3>Cachement Areas</h3>
                                <ul id="list">

                                </ul>
                              </div>
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
      <script src="assets/js/cach.js" type="text/javascript"></script>
	    <!--   Core JS Files   -->
	    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
		  <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	    <!--  Notifications Plugin    -->
	    <script src="assets/js/bootstrap-notify.js"></script>
	    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
		<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

		<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
		<script src="assets/js/demo.js"></script>
	</html>
<?php else:
	header("Location:logout.php");
	exit;
?>
<?php endif; ?>
