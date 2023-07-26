<?php session_start(); error_reporting(E_ALL); ini_set("display_errors","on");?>
<?php if (isset($_SESSION['allow']) && isset($_SESSION['admin'])):?>
  <?php if (isset($_GET['id']) && !empty($_GET['id'])):
    include '../db/db.php';
    $id = $_GET['id'];

    #Get the number of courses offered by this university.
    $q = $db->prepare("select count(id) from school_courses where school_id = ?");
    $q->bind_param('s',$id);
    $q->execute();
    $q->bind_result($no_courses);
    $q->fetch();
    $q->free_result();
    $q->close();

    #Get secondary school subjects.
    $q = $db->prepare("select id, name from prerequisites order by name");
    $q->execute();
    $q->bind_result($subject_id, $subject);
    $i = 0;
    $subjects = array();
    while ($q->fetch()) {
      $subjects["$subject"] = $subject_id;
      $i++;
    }
    $q->close();

    $q = $db->prepare("select name, owned, state, location, web, phone, email from universities where id = ?");
    $q->bind_param('s', $id);
    $q->execute();
    $q->store_result();
    $n = $q->num_rows;

    $q1 =  $db->prepare("select name, id from courses order by name");
    $q1->execute();
    $q1->store_result();
    $q1->bind_result($course, $courseid);
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
  	                <li class="active">
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
  										<div class="col-md-7">
  											<div class="card" style="padding-bottom: 20px;">
                          <?php if (isset($_SESSION['msg'])): ?>
                            <div class="alert alert-info text-center bold">
                              <?php echo $_SESSION['msg']; ?>
                            </div>
                          <?php endif; unset($_SESSION['msg']);?>
  												<div class="header">
                            <h4>Institution Information</h4>
  												</div>
  												<div class="content">
                            <?php if ($n > 0):
                              $q->bind_result($name, $owned, $state, $location, $web, $phone, $email);
                              $q->fetch();
                            ?>
                              <p> <b>Name</b> <?php echo $name; ?> </p>
                              <p> <b>Type:</b> <?php echo $owned; ?> institution.</p>
                              <p> <b>State:</b> <?php echo $state; ?> </p>
                              <p> <b>Address:</b> <?php echo $location; ?> </p>
                              <p> <b>Wesite:</b> <a href="<?php echo $web; ?>" target="_blank"><?php echo $web; ?></a> </p>
                              <p> <b>Email:</b> <?php echo $email; ?> </p>
                              <p> <b>Phone:</b> <?php echo $phone; ?></p>
                              <p> <b>No. of courses:</b> <?php echo $no_courses; ?> </p>
                              <div class="btn-group btn-group-justified">
                                <a href="view-school-courses.php?school_id=<?php echo $id; ?>" class="btn btn-primary">View courses they offer</a>
                              </div>
                            <?php else: ?>
                              institution wasn't found!
                            <?php endif; $q->close(); ?>
  												</div>
  											</div>
  										</div>
                      <div class="col-md-5">
                        <div class="card" style="padding-bottom: 20px;">
                          <div class="header">
                            <h4>Add course</h4>
                            <form class="" action="add-school-course.php" method="post">
                              <div class="form-group">
                                <label for="">select Course</label>
                                <select class="form-control" name="course">
                                  <?php while($q1->fetch()): ?>
                                    <option value="<?php echo $courseid; ?>"> <?php echo $course; ?> </option>
                                  <?php endwhile; ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="">select Prerequisite subjects</label>
                                <div class="row">
                                  <div class="col-md-6">
                                    <select class="form-control" name="subject1" required>
                                      <option value="">Select subject one</option>
                                      <?php foreach ($subjects as $key => $value): ?>
                                        <option value="<?php echo $value; ?>"><?php echo $key; ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>
                                   <div class="col-md-6">
                                    <select class="form-control" name="sg1" required>
                                      <option value="">Select subject grade</option>
                                        <option value="A1-C6">A1-C6</option>
                                         <option value="A1-D7">A1-D7</option>
                                    </select>
                                  </div>
                                  <div class="col-md-6">
                                    <select class="form-control" name="subject2" required>
                                      <option value="">Select subject two</option>
                                      <?php foreach ($subjects as $key => $value): ?>
                                        <option value="<?php echo $value; ?>"><?php echo $key; ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>
                                  <div class="col-md-6">
                                    <select class="form-control" name="sg2" required>
                                      <option value="">Select subject grade</option>
                                        <option value="A1-C6">A1-C6</option>
                                         <option value="A1-D7">A1-D7</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <select class="form-control" name="subject3" required>
                                      <option value="">Select subject three</option>
                                      <?php foreach ($subjects as $key => $value): ?>
                                        <option value="<?php echo $value; ?>"><?php echo $key; ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>
                                  <div class="col-md-6">
                                    <select class="form-control" name="sg3" required>
                                      <option value="">Select subject grade</option>
                                        <option value="A1-C6">A1-C6</option>
                                         <option value="A1-D7">A1-D7</option>
                                    </select>
                                  </div>
                                  <div class="col-md-6">
                                    <select class="form-control" name="subject4" required>
                                      <option value="">Select subject four</option>
                                      <?php foreach ($subjects as $key => $value): ?>
                                        <option value="<?php echo $value; ?>"><?php echo $key; ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>
                                  <div class="col-md-6">
                                    <select class="form-control" name="sg4" required>
                                      <option value="">Select subject grade</option>
                                        <option value="A1-C6">A1-C6</option>
                                         <option value="A1-D7">A1-D7</option>
                                    </select>
                                  </div>
                                
                                <div class="col-md-6">
                                <select class="form-control" name="subject5" required>
                                  <option value="">Select subject five</option>
                                  <?php foreach ($subjects as $key => $value): ?>
                                    <option value="<?php echo $value; ?>"><?php echo $key; ?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                              <div class="col-md-6">
                                    <select class="form-control" name="sg5" required>
                                      <option value="">Select subject grade</option>
                                        <option value="A1-C6">A1-C6</option>
                                         <option value="A1-D7">A1-D7</option>
                                    </select>
                                  </div>
                            
                              </div>

                              <div class="form-group">
                                <div class="row">
                                  <div class="col-md-12">
                                    <label for="cost">Jamb Score</label>
                                    <input type="number" name="jamb" value="" placeholder="Minimum jamb score" class="form-control">
                                  </div>
                                </div>
                              </div>
                              <input type="hidden" name="school_id" value="<?php echo $id; ?>">
                              <div class="form-group">
                                <input type="submit" name="add-course" value="Add" class="btn btn-primary btn-fill">
                              </div>
                            </form>
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
  	</html>

  <?php else:
    header("Location:./home.php");
    exit;
  ?>
  <?php endif; ?>
	<?php else:
	header("Location:logout.php");
	exit;
?>
<?php endif; ?>
