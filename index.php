<?php
session_start();
include "connect.php";

######################################################### STUDENT LOGIN #########################################################

if (isset($_POST['student'])) {
	$reg_no=$_POST['reg_no'];
	$password=$_POST['password'];
	$pass =md5($password);

	$ret = mysqli_query($con,"SELECT * FROM student WHERE reg_no='$reg_no' AND password='$pass'");
	$num=mysqli_fetch_array($ret);
	if ($num>0) {
		$extra="student/home.php";
		$_SESSION['student']=$num['surname'];
		$_SESSION['student_id']=$num['reg_no'];
		$_SESSION['department']=$num['department'];
		// $_SESSION['login']=$_POST['uemail'];
		// $_SESSION['id']=$num['id'];
		// $_SESSION['name']=$num['fname'];
		$host=$_SERVER['HTTP_HOST'];
		$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
		header("location:http://$host$uri/$extra");
		exit();
		}
		else
{
echo "<script>alert('Invalid username or password');</script>";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra"); //header("home.php");
// header("location:index.php");
exit();
}
}



############################################### STAFF LOGIN ##################################################################

if (isset($_POST['staff'])) {
	$reg_no=$_POST['reg_no'];
	$password=$_POST['password'];
	$pass =md5($password);

	$ret =mysqli_query($con,"SELECT * FROM staff WHERE staff_id='$reg_no' AND password='$pass'");
	$num=mysqli_fetch_array($ret);
	if ($num>0) {
		$extra="staff/home.php";
		$_SESSION['staff']=$num['surname'];
		$_SESSION['staff_id']=$num['staff_id'];
		// $_SESSION['login']=$_POST['uemail'];
		// $_SESSION['id']=$num['id'];
		// $_SESSION['name']=$num['fname'];
		$host=$_SERVER['HTTP_HOST'];
		$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
		 header("location:http://$host$uri/$extra");
			exit();
	}else
{
echo "<script>alert('Invalid username or password');</script>";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
// header("location:http://$host$uri/$extra"); //header("home.php");
// header("location:index.php");
exit();
}	
}

############################################################### ADMIN LOGIN #############################################################
if (isset($_POST['admin'])) {
	$reg_no=$_POST['reg_no'];
	$password=$_POST['password'];
	$pass =md5($password);

	$ret = mysqli_query($con, "SELECT * FROM admin WHERE username='$reg_no' AND password='$pass'");
	$num=mysqli_fetch_array($ret);
	if ($num>0) {
		$extra="admin/home.php";
		$_SESSION['admin']=$num['username'];
		$_SESSION['admin_id']=$num['id'];
		// $_SESSION['login']=$_POST['uemail'];
		// $_SESSION['id']=$num['id'];
		// $_SESSION['name']=$num['fname'];
		$host=$_SERVER['HTTP_HOST'];
		$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
		header("location:http://$host$uri/$extra");
			exit();
		}else
{
echo "<script>alert('Invalid username or password');</script>";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
// header("location:http://$host$uri/$extra"); //header("home.php");
// header("location:index.php");
exit();
}	
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>LogIn</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700,900" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- material design -->
	<!-- <link rel="stylesheet" type="text/css" href="css/materialize.min.css"> -->

	<!-- Owl Carousel -->
	<link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
			  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
			<![endif]-->



	<!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
  <link rel="stylesheet" type="text/css" href="css/materialize.min.css">
  <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->

</head>
<body>

	<!-- Header -->
	<header id="header" class="transparent-navbar">
		<!-- container -->
		<div class="container">
			<!-- navbar header -->
			<div class="navbar-header">
				<!-- Logo -->
				<div class="navbar-brand">
					<a class="logo" href="index.html">
						<img class="logo-img" src="img/logo2.jpg" alt="logo">
						<img class="logo-alt-img" src="img/logo1.jpg" alt="logo">
					</a>
				</div>
				<!-- /Logo -->

				<!-- Mobile toggle -->
				<button class="navbar-toggle">
						<i class="fa fa-bars"></i>
					</button>
				<!-- /Mobile toggle -->
			</div>
			<!-- /navbar header -->

			<!-- Navigation -->
			<nav id="nav">
				<ul class="main-nav nav navbar-nav navbar-right">
					<li><a href="#home">Home</a></li>
					<li><a href="#about">About</a></li>
					<!-- <li><a href="#schedule">Schedule</a></li>
					<li><a href="#speakers">Speakers</a></li>
					<li><a href="#sponsors">Sponsors</a></li> -->
					<li><a href="#contact">Contact</a></li>
					<li><a href="#" data-toggle="modal" data-target="#speaker-modal-1" >Log In</a></li>
				</ul>
			</nav>
			<!-- /Navigation -->
		</div>
		<!-- /container -->
	</header>
	<!-- /Header -->

	<!-- Home -->
	<div id="home">
		<!-- background image -->
		<div class="section-bg" style="background-image:url(./img/background01.jpg)" data-stellar-background-ratio="0.5"></div>
		<!-- /background image -->

		<!-- home wrapper -->
		<div class="home-wrapper">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- home content -->
					<div class="col-md-8 col-md-offset-2">
						<div class="home-content">
							<h1>Kyambogo University</h1>
							<h4 class="lead">Faculty Of Science E-Notice Board.</h4>
							<a href="#about" class="main-btn">More</a>
						</div>
					</div>
					<!-- /home content -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /home wrapper -->
	</div>
	<!-- /Home -->

	<!-- About -->
	<div id="about" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="section-title">
					<h3 class="title"><span>About</span> <span style="color: #005ce6;">Kyambogo University</span></h3>
				</div>
				<!-- /section title -->

				<div class="col-md-8 col-md-offset-2 text-center">
					<!-- about content -->
					<div class="about-content">
						<p>All University Policies must be approved by the University Council,  before they can become effective. Below are some of the approved policies and guidelines.</p>
						<p>To be a Centre of Academic and Professional Excellence.</p>
						<p>To advance and promote knowledge and development of skills in Science, Technology and Education, and in such other fields having regards for quality, equity, progress and transformation of society.</p>
					</div>
					<!-- /about content -->

					<!-- Numbers -->
					
				</div>
			</div>
			<!-- row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /About -->

	<!-- Galery -->
	<div id="galery">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- galery owl -->
				<div id="galery-owl" class="owl-carousel owl-theme">
					<!-- galery item -->
					<div class="galery-item">
						<img src="img/ky1.jpg" alt="">
					</div>
					<!-- /galery item -->

					<!-- galery item -->
					<div class="galery-item">
						<img src="img/ky2.jpg" alt="">
					</div>
					<!-- /galery item -->

					<!-- galery item -->
					<div class="galery-item">
						<img src="img/ky3.jpg" alt="">
					</div>
					<!-- /galery item -->

				</div>
				<!-- /galery owl -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /Galery -->

	<!-- Video CTA -->
	<div id="video-cta" class="section">
		<!-- background image -->
		<div class="section-bg" style="background-image:url(./img/background02.jpg)" data-stellar-background-ratio="0.5"></div>
		<!-- /background image -->

		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- cta content -->
				<div class="col-md-8 col-md-offset-2">
					<div class="cta-content text-center">
						<a class="video-play" href="#">
							<i class="fa fa-play"></i>
						</a>
						<h2>Watch this video</h2>
						<p class="lead">To advance and promote knowledge and development of skills in Science, Technology and Education, and in such other fields having regards for quality, equity, progress and transformation of society.</p>
					</div>
				</div>
				<!-- /cta content -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /Video CTA -->

	<!-- Event Schedule -->
	
				<!-- speaker modal -->
				<div id="speaker-modal-1" class="speaker-modal modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<button type="button" class="speaker-modal-close" data-dismiss="modal"></button>
							<div class="modal-body">
								<div class="row">
									<!-- tabs -->

									<div>

									  <!-- Nav tabs -->
									  <ul class="nav nav-tabs" role="tablist">
									    <!-- <li role="presentation" ><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li> -->
									    <li role="presentation" class="active" ><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Student</a></li>
									    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Staff</a></li>
									    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Admin</a></li>
									  </ul>

									  <!-- Tab panes -->
									  <div class="tab-content">
									    <div role="tabpanel" class="tab-pane active" id="home">


									    
									    	


									    </div>
									    <div role="tabpanel" class="tab-pane" id="profile">

									    	<h1>Student</h1>
									    				<form method="POST" action="" enctype="">
															<div class="form-group">
																<div class="input-field col s12">
																	<label for="icon_prefix">Reg No.</label>
																	<input id="icon_prefix" type="text" name="reg_no" class="validate form-control">
																	
																</div>
															</div>
															<div class="form-group">
																<div class="input-field col s12">
																	<label for="icon_prefix">Pasword</label>
																	<input id="icon_prefix" type="password" name="password" class="validate form-control">
																	
																</div>
															</div>
															<div class="form-group">
																<input type="submit" class="btn btn-info" name="student" value="Long In">
															</div>
														</form>


									    	

																	    	



									    </div>
									    <div role="tabpanel" class="tab-pane" id="messages">
									    	<h1>Staff</h1>
									    	
									    				<form method="POST" action="" enctype="">
															<div class="form-group">
																<div class="input-field col s12">
																	<label for="icon_prefix">Staff No.</label>
																	
																	<input id="icon_prefix" type="text" name="reg_no" class="validate form-control">
																</div>
															</div>
															<div class="form-group">
																<div class="input-field col s12">
																	<label for="icon_prefix">Pasword</label>
																	<input id="icon_prefix" type="password" name="password" class="validate form-control">
																	
																</div>
															</div>
															<div class="form-group">
																<input type="submit" class="btn btn-info" name="staff" value="Long In">
															</div>
														</form>



									    </div>
									    <div role="tabpanel" class="tab-pane" id="settings">

									    	<h1>Admin</h1>

									    	<form method="POST" action="" enctype="">
												<div class="form-group">
													<div class="input-field col s12">
														<label for="icon_prefix">User Name.</label>
														<input id="icon_prefix" type="text" name="reg_no" class="validate form-control">
														
													</div>
												</div>
												<div class="form-group">
													<div class="input-field col s12">
														<label for="icon_prefix">Pasword</label>
													
														<input id="icon_prefix" type="password" name="password" class="validate form-control">
													</div>
												</div>
												<div class="form-group">
													<input type="submit" class="btn btn-info" name="admin" value="Long In">
												</div>
											</form>
</div>
									  </div>

									</div>


									<!-- end tabs -->
	
							</div>
						</div>
					</div>
				</div>
			</div>
				<!-- /speaker modal -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /Speakers -->

	<!-- Sponsors -->


	<!-- Contact -->
	<div id="contact" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="section-title">
					<h3 class="title"><span>Contact</span> <span style="color: #005ce6;">Info</span></h3>
				</div>
				<!-- /section title -->

				<!-- contact -->
				<div class="col-sm-4">
					<div class="contact">
						<h3>Address</h3>
						<p>P.O.BOX 1 KYAMBOGO TEL. 0414-285035/041-2895037/287502/287343 Kampala</p>
					</div>
				</div>
				<!-- /contact -->

				<!-- contact -->
				<div class="col-sm-4">
					<div class="contact">
						<h3>Phone</h3>
						<p>0414 – 285 037</p>
 
						<p>0414 – 285 037</p>
					</div>
				</div>
				<!-- /contact -->

				<!-- contact -->
				<div class="col-sm-4">
					<div class="contact">
						<h3>Email</h3>
						<a href="#">arkyu@kyu.ac.ug</a>
					</div>
				</div>
				<!-- /contact -->

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->

		<!-- Map -->
		<div id="map"></div>
		<!-- /Map -->
	</div>
	<!-- /Contact -->

	<!-- Footer -->
	<footer id="footer">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<!-- footer logo -->
				<div class="col-md-4 col-md-push-4">
					<div class="footer-brand">
						<a class="logo" href="index.html">
							<img class="logo-img" src="img/logo2.jpg" alt="logo">
						</a>
					</div>
				</div>
				<!-- /footer logo -->

				<!-- contact social -->
				<div class="col-md-4 col-md-push-4">
					<div class="contact-social">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-google-plus"></i></a>
						<a href="#"><i class="fa fa-instagram"></i></a>
						<a href="#"><i class="fa fa-pinterest"></i></a>
						<a href="#"><i class="fa fa fa-linkedin"></i></a>
					</div>
				</div>
				<!-- /contact social -->

				<!-- copyright -->
				<div class="col-md-4 col-md-pull-8">
					<span class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with<i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank">Wamula Bashir</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
				</div>
				<!-- /copyright -->

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /Footer -->










	

	
		



<!-- log in forms -->

		<!-- 	<form method="POST" action="" enctype="">
				<div class="row">
					<div class="input-field col s12">
						 <i class="material-icons prefix">account_circle</i>
						<input id="icon_prefix" type="text" name="reg_no" class="validate form-control">
						<label for="icon_prefix">Reg No.</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<i class="material-icons prefix">lock</i>
						<input id="icon_prefix" type="password" name="password" class="validate form-control">
						<label for="icon_prefix">Pasword</label>
					</div>
				</div>
				<div>
					<input type="submit" name="student" value="Long In">
				</div>
			</form> -->
	
<!--  -->
			<!-- <form method="POST" action="" enctype="">
				<div class="row">
					<div class="input-field col s12">
						 <i class="material-icons prefix">account_circle</i>
						<input id="icon_prefix" type="text" name="reg_no" class="validate form-control">
						<label for="icon_prefix">Reg No.</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<i class="material-icons prefix">lock</i>
						<input id="icon_prefix" type="password" name="password" class="validate form-control">
						<label for="icon_prefix">Pasword</label>
					</div>
				</div>
				<div>
					<input type="submit" name="staff" value="Long In">
				</div>
			</form> -->


			<!-- <form method="POST" action="" enctype="">
				<div class="row">
					<div class="input-field col s12">
						 <i class="material-icons prefix">account_circle</i>
						<input id="icon_prefix" type="text" name="reg_no" class="validate form-control">
						<label for="icon_prefix">Reg No.</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<i class="material-icons prefix">lock</i>
						<input id="icon_prefix" type="password" name="password" class="validate form-control">
						<label for="icon_prefix">Pasword</label>
					</div>
				</div>
				<div>
					<input type="submit" name="admin" value="Long In">
				</div>
			</form> -->

			<!-- End of Login forms -->








<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	<script src="js/google-map.js"></script>
	<script src="js/jquery.countTo.js"></script>
	<script src="js/main.js"></script>




	 
    



</body>
</html>