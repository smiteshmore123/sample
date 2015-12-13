<?php
session_start();
$_SESSION['category']="water tanker";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
  <script>
// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.

var placeSearch,autocomplete, autocomplete1;
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initialize() {
  // Create the autocomplete object, restricting the search
  // to geographical location types.
  autocomplete1 = new google.maps.places.Autocomplete(
      /** @type {HTMLInputElement} */(document.getElementById('autocomplete1')),
      { types: ['geocode'] , componentRestrictions: {country: "in"} });
  // When the user selects an address from the dropdown,
  // populate the address fields in the form.
  google.maps.event.addListener(autocomplete1, 'place_changed', function() {
    fillInAddress();
  });

autocomplete = new google.maps.places.Autocomplete(
      /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
      { types: ['geocode'],componentRestrictions: {country: "in"} });
  // When the user selects an address from the dropdown,
  // populate the address fields in the form.
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    fillInAddress();
  });

}
// [START region_fillform]
function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete1.getPlace();
  var place1 = autocomplete.getPlace();

  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details
  // and fill the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
	
  }
   for (var i = 0; i < place1.address_components.length; i++) {
    var addressType1 = place1.address_components[i].types[0];
    if (componentForm[addressType1]) {
      var val1 = place1.address_components[i][componentForm[addressType1]];
      document.getElementById(addressType1).value = val1;
    }
	
  }
}
// [END region_fillform]

// [START region_geolocation]
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = new google.maps.LatLng(
          position.coords.latitude, position.coords.longitude);
      var circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy
      });
      autocomplete1.setBounds(circle.getBounds());
	  autocomplete.setBounds(circle.getBounds());
    });
  }
}
// [END region_geolocation]

    </script>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Smitesh R More (www.transmego.com)">
	
	<title>Transmego | Book a water tanker</title>

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

<body onload="initialize()" class="home">
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
			<center><div class="col-lg-12 text-center">
                <h1>Selected Type: Water Tanker</h1>
                <p class="lead">&nbsp;</p>
            </div>
			<center><div class="col-lg-12 text-center">
                <h3>Select Purpose:</h3>
                <p class="lead">&nbsp;</p>
            </div>
         
      <div class="col-lg-12 text-center">
      <form action="process_booking.php" method="post">
                <select class="form-control" name="subtype" id="subtype">
                <option value="Drinking">Drinking</option>
                <option value="Construction">Construction</option>
                <option value="Other">Other</option>
                
                
                </select>
                <br>
                <input class="form-control" name="submit" type="submit" value="Get Quote">
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
</body>
</html>