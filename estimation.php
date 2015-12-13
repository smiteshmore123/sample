<?php
session_start();
$_SESSION['category']="car";
$_SESSION['subtype']=$_POST['subtype'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
 #map {
        height: 100%;
        float: left;
        width: 63%;
        height: 100%;
      }
      #right-panel {
        float: right;
        width: 34%;
        height: 100%;
      }
#right-panel {
  font-family: 'Roboto','sans-serif';
  line-height: 30px;
  padding-left: 10px;
}

#right-panel select, #right-panel input {
  font-size: 15px;
}

#right-panel select {
  width: 100%;
}

#right-panel i {
  font-size: 12px;
}

      .panel {
        height: 100%;
        overflow: auto;
      }
    </style>
  
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Smitesh R More (www.transmego.com)">
	
	<title>Transmego | Book a car</title>

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

<body class="home">
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
					<li><a class="btn" href="signin.html"><?php echo "Login" ?> </a></li>
                    <li><a class="btn" href="signup.html">Register</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

	<!-- Header --><!-- /Header -->

	<!-- Intro --><!-- /Intro-->
		
	<!-- Highlights - jumbotron -->
	<div class="jumbotron top-space">
	  <div class="container">
		<center>
          <div class="col-lg-12 text-center">
        	<div id="map"></div>
            <div id="right-panel">
              <p>Total Distance: <span id="total"></span></p>
              <p>Estimated Cost: <span id="cost"></span></p>
            </div>
             <p class="lead">&nbsp;</p>
          </div>
		</center>
         
        <div class="col-lg-12 text-center">
          <form action="process_booking.php" method="post">
            <br>
            <input class="form-control" name="submit" type="submit" value="Confirm">
          </form>
        </div>
	  </div>
	</div>
	<!-- /Highlights -->

	<!-- container --><!-- /container -->
	
	<!-- Social links. @TODO: replace by link/instructions in template -->
	<section id="social">
		<div class="container">
			<div class="wrapper clearfix">
				<!-- AddThis Button BEGIN -->
				<div class="addthis_toolbox addthis_default_style">
				<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
				<a class="addthis_button_tweet"></a>
				<a class="addthis_button_linkedin_counter"></a>
				<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
				</div>
				<!-- AddThis Button END -->
			</div>
		</div>
	</section>
	<!-- /social links -->


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
							<p class="text-right">
								Copyright &copy; 2015, All rights reserved by Zoof Software Solutions Pvt. Ltd.
							</p>
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
     <script>
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 4,
    center: {lat: 21.0000, lng: 78.0000}  //India.
  });

  var directionsService = new google.maps.DirectionsService;
  var directionsDisplay = new google.maps.DirectionsRenderer({
    draggable: true,
    map: map
  });
  
  computeTotalDistance();

  directionsDisplay.addListener('directions_changed', function() {
    computeTotalDistance(directionsDisplay.getDirections());
  });

  displayRoute("<?php echo $_SESSION['source']; ?>", "<?php echo $_SESSION['destination']; ?>", directionsService,
      directionsDisplay);
}

function displayRoute(origin, destination, service, display) {
  service.route({
    origin: origin,
    destination: destination,
    travelMode: google.maps.TravelMode.DRIVING
  }, function(response, status) {
    if (status === google.maps.DirectionsStatus.OK) {
      display.setDirections(response);
    } else {
      alert('Could not display directions due to: ' + status);
    }
  });
}

function computeTotalDistance(result) {
  var cost = "<?php if($_SESSION['subtype'] == "Maruti Suzuki EECO"){
      $rate = 10;
	  //echo $rate;
  } elseif($_SESSION['subtype'] == "Honda City") {
	  $rate = 11;
	  //echo $rate;
  } else {
	  //echo "nowhere";
  }
  $distance = explode(" ", $_SESSION['distance']);
  echo $rate * $distance[0];
	 ?>";
  document.getElementById('total').innerHTML = "<?php echo $_SESSION['distance']; ?>";
  document.getElementById('cost').innerHTML = "Rs. " + cost + "/-";
}
    </script>
     <script src="https://maps.googleapis.com/maps/api/js?signed_in=true&callback=initMap"
        async defer></script>
</body>
</html>