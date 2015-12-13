<?php 
session_start();
$test=$_GET["cat"];
$_SESSION['vehicle_type']=$test;
require('database.php');
/*if($test=="car"){
$res1=mysqli_query($link,"SELECT * FROM `car_subcategory`");
}
else{
	echo "Nothing happened";
	}
*/
$types=mysqli_query($link,"SELECT vt_table_name FROM `vehicle_types` where `vt_name`='".$test."'");
$row1=mysqli_fetch_array($types);
//echo $row1['vt_table_name'];
if($test){
$res1=mysqli_query($link,"SELECT * FROM ".$row1['vt_table_name']."");
}
else{
	echo "Nothing happened";
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Transmego - Any vehicle.Any time.Any Where.</title>

    <!-- Bootstrap Core CSS -->
    <link href="../22aug_backup_transmego/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../22aug_backup_transmego/index.html">Transmego</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="../22aug_backup_transmego/index.html">Home</a>
                    </li>
                    <li>
                        <a href="http://www.transmego.com/company/index.html">About</a>
                    </li>
                   <!-- <li>
                        <a href="#">Services and Fares</a>
                    </li>-->
                    <li>
                        <a href="../22aug_backup_transmego/contact_us.php">Contact</a>
                    </li>
                    <li>
                        <a href="../22aug_backup_transmego/partner/index.html">Partner with us</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
    <!--Dynamic-->
    <?php
	if($_SESSION['vehicle_type']=="bus")
	{
   echo "<div class='navbar-xs'>
<div id='lower-nav' class='navbar navbar-default navbar-static-top'>
    <div class='navbar-header'>
        <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>
            <span class='sr-only'>Toggle navigation</span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
        </button>
        <a class='navbar-brand' href='#'>&nbsp;</a>
    </div>

    <div class='navbar-collapse collapse'>
        <ul class='nav navbar-nav'>
            <li><a href='#'><i class='fa fa-group'></i>Class: <br><select><option>Deluxe</option><option>Semi Deluxe</option><option>Normal / Economical</option></select></a></li>
            <li><a href='#'><i class='fa fa-tint'></i>Type: <br><select><option>AC</option><option>Non AC</option></select></a></li>
            <li><a href='#'><i class='fa fa-wrench'></i>No Of Seats: <br><select><option>24</option><option>40</option><option>49</option></select></a></li>
        </ul>
        <ul class='nav navbar-nav navbar-right' style='margin-right: 5px;'>
            <li><a href='#'><input type='submit' value='Filter'/></li>
        </ul>
     </div>
</div>";
	}
	
	elseif($_SESSION['vehicle_type']=="watertanker")
	{
   echo "<div class='navbar-xs'>
<div id='lower-nav' class='navbar navbar-default navbar-static-top'>
    <div class='navbar-header'>
        <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>
            <span class='sr-only'>Toggle navigation</span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
        </button>
        <a class='navbar-brand' href='#'>&nbsp;</a>
    </div>

    <div class='navbar-collapse collapse'>
        <ul class='nav navbar-nav'>
            <li><a href='#'><i class='fa fa-group'></i>Quantity: <br><select><option>1000 Litres</option><option>3000 Litres</option><option>10000 Litres</option></select></a></li>
            <li><a href='#'><i class='fa fa-tint'></i>Material Type: <br><select><option>Water</option><option>Kerosene</option></select></a></li>
           
        </ul>
        <ul class='nav navbar-nav navbar-right' style='margin-right: 5px;'>
            <li><a href='#'><input type='submit' value='Filter'/></li>
        </ul>
     </div>
</div>";
	}
?>
<!--dynamic-->

</div>

        <div class="row">
            <center><div class="col-lg-12 text-center">
                <h1>Select your Sub Category :</h1>
                <p class="lead">&nbsp;</p>
            </div>
            
            <?php
			while($row=mysqli_fetch_array($res1)){ 
            echo "<div class='col-sm-6 col-md-3'>";
	echo "<div class='thumbnail tile tile-wide tile-orange'>";
    
		echo "<a href='search.php?model=".$row[$test.'_sc_pagename']."' >";
        echo "<center> <h1>".$row[$test.'_sc_name']."</h1></center>";
        echo "<img src='assets/images/".$row[$test.'_sc_pic']."'>";
		
			
		echo "</a>";
	echo "</div>";
echo "</div>";
												}//close while

?>
            









           
            
            
            
 
      
    <!-- /.row --></div>
    <!-- /.container -->
    <br><br>
<div class="col-lg-12 text-center">
<p>Note: Images are for represention purpose only.Actual vehicle may differ and depends on your preference.
</p></div>
</div>

    <!-- jQuery Version 1.11.1 -->
    <script src="../22aug_backup_transmego/assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../22aug_backup_transmego/assets/js/bootstrap.min.js"></script>

</body>

</html>
