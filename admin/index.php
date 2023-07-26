<?php
  session_start();
  if (isset($_SESSION['allow']) && isset($_SESSION['admin'])) {
    header("Location:home.php");
    exit;
  }
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>Admission Placement Recommender System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="assets/css/morris.css" type="text/css"/>
    <!-- Graph CSS -->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <link rel="assets/stylesheet" href="css/jquery-ui.css">

    <!--JQuery-->
    <script type="text/javascript" src="assets/js/jquery.3.2.1.min.js"></script>
    <!-- lined-icons -->
    <link rel="stylesheet" href="assets/css/icon-font.min.css" type='text/css' />

    <!-- //lined-icons -->
    <style>
          .card-container.card {
          max-width: 350px;
          padding: 40px 40px;
      }
      .card {
          background-color: #F7F7F7;
          /* just in case there no content*/
          padding: 20px 25px 30px;
          margin: 0 auto 25px;
          margin-top: 50px;
          /* shadows and rounded borders */
          -moz-border-radius: 2px;
          -webkit-border-radius: 2px;
          border-radius: 2px;
          -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
          -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
          box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
      }

      .profile-img-card {
          width: 96px;
          height: 96px;
          margin: 0 auto 10px;
          display: block;
          -moz-border-radius: 50%;
          -webkit-border-radius: 50%;
          border-radius: 50%;
      }
      body, html {
          height: 100%;
          background-repeat: no-repeat;
          background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));
      }

      .card-container.card {
          max-width: 350px;
          padding: 40px 40px;
      }
      .card {
          background-color: #F7F7F7;
          /* just in case there no content*/
          padding: 20px 25px 30px;
          margin: 0 auto 25px;
          margin-top: 50px;
          /* shadows and rounded borders */
          -moz-border-radius: 2px;
          -webkit-border-radius: 2px;
          border-radius: 2px;
          -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
          -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
          box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
      }
    </style>
  </head>
  <body>

    <div class="col-md-12" style="margin-top: 40px;">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <h2 class="text-center col-md-12  col-sm-6" style="color: burlywood;font-family: sans-serif; font-weight: bolder; font-size: 30px; line-height: 12px;">Admin Login</h2>
          <div class="container">
            <div class="card card-container">
              <?php if (isset($_SESSION['msg'])): ?>
                <div class="alert alert-danger bold text-center text-warning">
                  <?php echo $_SESSION['msg']; ?>
                </div>
              <?php endif; unset($_SESSION['msg']); ?>
  	           <img src="assets/img/admin.png" class="profile-img-card">
               <p id="profile-name" class="profile-name-card"></p>

                  <form class="form-horizontal" method="post" action="auth.php">
                  	<div class="form-group">
                  		<div class="col-sm-12">
                  			<input type="text" name="username" class="form-control text-center" id="" placeholder="Username" autofocus="on">
                  		</div>
                  	</div>

                  	<div class="form-group">
                  		<div class="col-sm-12">
                  			<input type="password" name="password" class="form-control text-center" id="" placeholder="Password" required>
                  		</div>
                  	</div>

                    <div class="form-group mt-20">
                  		<div class="col-sm-12">
                  			<button type="submit" name="login" class="btn btn-success col-sm-12">Sign in</button>
                      </div>
                      <div class="col-sm-12" style="margin-top: 20px">
                        <a class="btn btn-danger pull-right col-sm-12" href="../"><span class="btn-label btn-label-right"><i class="fa fa-home"></i></span></a>
                  		</div>
                  	</div>

                  </form>

                </div>
              </div>
            </div>
            <!-- /.panel -->

          </div>
          <!-- /.col-md-11 -->
        </div>
        <!-- /.col-md-12 -->
  </body>
</html>
