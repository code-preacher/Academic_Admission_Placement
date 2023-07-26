<?php session_start(); error_reporting(E_ALL);
ini_set("display_errors","on");?>
<?php if (isset($_SESSION['admin']) && isset($_SESSION['allow'])): ?>
  <?php if (isset($_GET['school_id'])):
    include '../db/db.php';
    $id = $_GET['school_id'];
    $q = $db->prepare("select name from universities where id = ?");
    $q->bind_param('s', $id);
    $q->execute();
    $q->store_result();
    $n = $q->num_rows;
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
                    <li class="">
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
                          <?php if (isset($_SESSION['msg'])): ?>
                            <div class="alert alert-info text-center bold">
                              <?php echo $_SESSION['msg']; ?>
                            </div>
                          <?php endif; unset($_SESSION['msg']);?>
                          <?php if ($n < 1): ?>
                            <div class="header">
                              <h3>Sorry, institution wasn't found.</h3>
                            </div>
                          <?php else:
                            $q->bind_result($university);
                            $q->fetch();
                            $q->close();

                            $q = $db->prepare('select course_id, s1, s2, s3, s4, s5, jamb from school_courses where school_id = ?');
                            $q->bind_param('s', $id);
                            $q->execute();
                            $q->store_result();
                            $n2 = $q->num_rows;
                          ?>
                            <?php if ($n2 > 0):
                              $q->bind_result($cid, $s1, $s2, $s3, $s4, $s5, $jamb);
                              $x = 1;
                            ?>
                              <div class="header">
                                <h3>List of courses offered by <?php echo $university ?> </h3>
                              </div>
                              <div class="content">
                                <?php while ($q->fetch()):
                                  $q0 = $db->prepare('select name, faculty from courses where id = ? order by faculty');
                                  $q0->bind_param('s',$cid);
                                  $q0->execute();
                                  $q0->bind_result($course_title, $faculty);
                                  $q0->fetch();
                                  $q0->close();

                                  $q0 = $db->prepare('select name from prerequisites where id = ?');
                                  $q0->bind_param('s',$s1);
                                  $q0->execute();
                                  $q0->bind_result($sb1);
                                  $q0->fetch();

                                  $q0->bind_param('s',$s2);
                                  $q0->execute();
                                  $q0->bind_result($sb2);
                                  $q0->fetch();

                                  $q0->bind_param('s',$s3);
                                  $q0->execute();
                                  $q0->bind_result($sb3);
                                  $q0->fetch();

                                  $q0->bind_param('s',$s4);
                                  $q0->execute();
                                  $q0->bind_result($sb4);
                                  $q0->fetch();

                                  $q0->bind_param('s',$s5);
                                  $q0->execute();
                                  $q0->bind_result($sb5);
                                  $q0->fetch();
                                  $q0->close();
                                ?>
                                  <table class="table table-bordered table-responsive text-center bold">
                                    <thead>
                                      <tr>
                                        <th> <b>#</b> </th>
                                          <th> <b>course</b> </th>
                                        <th> <b>Faculty</b> </th>
                                        <th colspan="5"> <b>Prerequiste subjects</b> </th>
                                        <th> <b>Jamb requirement</b> </th>
                                        <th>Remove</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <tbody>
                                          <td> <?php echo $x; $x++; ?> </td>
                                          <td> <?php echo $course_title; ?> </td>
                                          <td> <?php echo $faculty; ?> </td>
                                          <td>  <?php echo $sb1;  ?> </td>
                                          <td>  <?php echo $sb2;  ?> </td>
                                          <td>  <?php echo $sb3;  ?> </td>
                                          <td>  <?php echo $sb4;  ?> </td>
                                          <td>  <?php echo $sb5;  ?> </td>
                                          <td>  <?php echo $jamb;  ?> </td>
                                           <td> <a href="delete.php?j=<?php echo $jamb; ?>&id=<?php echo $id; ?>&c=<?php echo $course_title; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a> </td>
                                        </tbody>
                                      </tr>
                                    </tbody>
                                  </table>
                                <?php endwhile; ?>
                              </div>
                            <?php else: ?>
                              <div class="header">
                                <h3><?php echo $university ?> is yet to add the courses they offer.</h3>
                              </div>
                            <?php endif; ?>
                          <?php endif; ?>
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
