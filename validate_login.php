<?php
session_start();
require('database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Smitesh R More, Zoof Software Solutions Pvt Ltd.">
	
	<title>Sign in | Transmego</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="index.html"><img src="assets/images/logo.png" alt="Transmego Logo"> Transmego</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<!--<li class="active"><a href="http://www.transmego.com/category.php">Book Now</a></li>-->
					<li><a href="about.html">About</a></li>
                    <li><a href="http://www.transmego.com/inyourcity/index.html">Start in your city</a></li>
					<li><a href="about.html">Partner with us</a></li>
					<li><a href="contact.html">Contact</a></li>
					<li><a class="btn" href="signin.html">Login</a></li>
                    <li><a class="btn" href="signup.html">Register</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

	<header id="head" class="secondary"></header>

	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="index.html">Home</a></li>
			<li class="active">User access</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Sign in</h1>
				</header>
                 <?php 
			//echo $_SESSION['booking'];
			//echo $_POST['login_username'];
		    //echo $_POST['login_password'];
		
			error_reporting(0);
			if ($_SESSION['booking']=="n" && $_POST['login_username'] && $_POST['login_password']){
			
			//login validation
			$user_match_result=mysqli_query($link,"SELECT * FROM `user_details` WHERE `email`='".$_POST['login_username']."' AND `password`='".$_POST['login_password']."' ");
			
			echo "SELECT * FROM `user_details` WHERE `email`='".$_POST['login_username']."' AND `password`='".$_POST['login_password']."' ";
			
			echo"<center> <div class='alert alert-danger' role='alert'><b>Please log in for completion of booking</b></div></center>";
			//if($user_match_result===1){
				//echo "in if";
				while($row=mysqli_fetch_array($user_match_result,MYSQLI_ASSOC)){ 
					//echo "in while";
					//echo $row['email'];
					//echo $row['password'];
					if($_POST['login_username']==$row['email'] && $_POST['login_password']==$row['password']){
					
				//if username and password is correct
				$_SESSION['user']=$row['email'];
				$_SESSION['user_id']=$row['user_unique_id'];
				$_SESSION['user_name']=$row['user_firstname'];
				echo $_SESSION['user'];
				echo $_SESSION['user_id'];
				header('Location: index.php');
				//echo "It is working!";
				  }
					
					//else{
				//if username and password is not correct
				//echo "in loop but if or while failed";
				//echo"<center> <div class='alert alert-danger' role='alert'><b>Username & Password combination doesn't match!</b></div></center>";
				    //    }
				                                                  }
				                   //     }
			
			/**/
			
			}
			elseif($_SESSION['booking']=="y" && !$_POST['login_username'] && !$_POST['login_password']) 
			{
				//User came from booking
			echo"<center> <div class='alert alert-danger' role='alert'><b>Please login!</b> In order to complete your booking.</div></center>";	
			}
			
			elseif($_SESSION['booking']=="y" && $_POST['login_username'] && $_POST['login_password'])
			
			{
				$user_match_result=mysqli_query($link,"SELECT * FROM `user_details` WHERE `email`='".$_POST['login_username']."' AND `password`='".$_POST['login_password']."'");
			echo "SELECT * FROM `user_details` WHERE `email`='".$_POST['login_username']."' AND `password`='".$_POST['login_password']."'";
			echo"<center> <div class='alert alert-danger' role='alert'><b>Username & Password combination doesn't match!</b></div></center>";
			//if($user_match_result===1){
				//echo "in if";
				while($row=mysqli_fetch_array($user_match_result)){ 
					//echo "in while";
					if($_POST['login_username']==$row['email'] && $_POST['login_password']==$row['password']){
					
				//if username and password is correct
				$_SESSION['user']=$row['email'];
				$_SESSION['user_id']=$row['user_unique_id'];
				header("Location: book_vehicle.php");
				
				
					}
				}
				}
			
			 ?>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Sign in to your account</h3>
							<p class="text-center text-muted">If not member, <a href="signup.html">Register</a> here. | Or just have <a href="guest.php">Guest Checkout.</a> </p>
							<hr>
							
							<form method="post" action="validate_login.php">
								<div class="top-margin">
									<label>Username/Email <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="login_username">
								</div>
								<div class="top-margin">
									<label>Password <span class="text-danger">*</span></label>
									<input type="password" class="form-control" name="login_password">
								</div>

								<hr>

								<div class="row">
									<div class="col-lg-8">
									<b><a href="">Forgot password?</a></b></div>
									<div class="col-lg-4 text-right">
										<button class="btn btn-action" type="submit">Sign in</button>
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>
				
			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->
	

	<footer id="footer" class="top-space">

		<div class="footer1">
			<div class="container">
				<div class="row">
					
					<div class="col-md-3 widget">
						<h3 class="widget-title">Contact</h3>
						<div class="widget-body">
							<p>+91 - 9004512628</p>
						  <p><br>
							  <a href="mailto:#">contact@transmego.com</a><br>
								<br>
							</p>	
						</div>
					</div>

					<div class="col-md-3 widget">
						<h3 class="widget-title">Follow me</h3>
						<div class="widget-body">
								<p class="follow-me-icons">
								<a href="https://www.facebook.com/pages/Transmego/440044812842756" target="_blank"><i class="fa fa-facebook fa-2"></i></a>
                                <a href="https://twitter.com/transmego" target="_blank"><i class="fa fa-twitter fa-2"></i></a>
																<a href="https://plus.google.com/u/0/b/111684158597403574467/+Transmegoofficial" target="_blank"><i class="fa fa-google-plus fa-2"></i></a>
								
							</p>	
						</div>
					</div>

					<div class="col-md-6 widget">
						<h3 class="widget-title">Important Links</h3>
						<div class="widget-body">
							<p><a href="http://www.transmego.com/partner/index.html">Partner With Us </a> | <a href="http://www.transmego.com/inyourcity/index.html">Transmego In Your City </a>						</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

		<div class="footer2">
			<div class="container">
				<div class="row">
					
					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="simplenav">
								<a href="http://www.transmego.com/category.php">Book Now</a> | 
								<a href="about.html">About</a> |
								<a href="http://www.transmego.com/inyourcity/index.html">Start in your city</a> |
								<a href="http://www.transmego.com/partner/index.html">Partner with us</a> |
								<a href="contact.html">Contact</a> |
								<b><a href="signup.html">Sign up</a></b>
							</p>
						</div>
					</div>

					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="text-right">Copyright &copy; 2015, All rights reserved by Zoof Software Solutions Pvt. Ltd. </p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>
	</footer>	
		




	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>