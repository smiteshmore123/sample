<?php 
session_start();
require('database.php');
ob_start();
//$_SESSION['user']="se";
$_SESSION['booking']="y";
$time = time();
$_SESSION['timestamp']=$time;
$unique_id1=uniqid();
$_SESSION["booking_user_id"]=$unique_id1;
$_SESSION["tentative_user_id"]=$_SESSION["booking_user_id"];
$_SESSION['mobile']=$_POST['mobile'];
$_SESSION['email']=$_POST['email'];
$_SESSION['source']=$_POST['autocomplete'];
$_SESSION['destination']=$_POST['autocomplete1'];
echo $_SESSION['mobile'];

 //request the directions
$source = urlencode($_SESSION['source']);
$dest = urlencode($_SESSION['destination']);

$url = "http://maps.googleapis.com/maps/api/directions/json?origin=$source&destination=$dest&alternatives=true&sensor=false";

$routes = json_decode(file_get_contents($url))->routes;

//sort the routes based on the distance
usort($routes,create_function('$a,$b','return intval($a->legs[0]->distance->value) - intval($b->legs[0]->distance->value);'));

//print the shortest distance
$_SESSION['distance'] = $routes[0]->legs[0]->distance->text;


$result=mysqli_query($link,"INSERT INTO `booking_table`( `booking_user_id`,`booking_phone`,`booking_source`, `booking_destination`, `timestamp` ) VALUES ('".$_SESSION['booking_user_id']."','".$_SESSION['mobile']."','".$_SESSION['source']."','".$_SESSION['destination']."','".$_SESSION['timestamp']."')");

echo "INSERT INTO `booking_table`( `booking_user_id`,`booking_phone` `booking_source`, `booking_destination`, `timestamp` ) VALUES ('".$_SESSION['booking_user_id']."','".$_SESSION['mobile']."','".$_SESSION['source']."','".$_SESSION['destination']."','".$_SESSION['timestamp']."')";



//echo "INSERT INTO `booking_table`( `booking_user_id`, `booking_source`, `booking_destination`, `timestamp` ) VALUES ('".$_SESSION['booking_user_id']."','".$_SESSION['source']."','".$_SESSION['destination']."','".$_SESSION['timestamp']."')";


if($result=1){
	//$prebook_details=mysqli_query($link,"SELECT * FROM `booking_table` WHERE `booking_user_id`='".$_SESSION['booking_user_id']."' AND `booking_source`='".$_SESSION['source']."' AND `booking_destination`='".$_SESSION['destination']."' AND `booking_startdate`='".$_SESSION['date']."' AND `booking_starttime`='".$_SESSION['time']."'");
	
	//echo "SELECT * FROM `booking_table` WHERE `booking_user_id`='".$_SESSION['user_id']."' AND `booking_source`='".$_SESSION['source']."' AND `booking_destination`='".$_SESSION['destination']."' AND `booking_startdate`='".$_SESSION['date']."' AND `booking_starttime`='".$_SESSION['time'].":00"."' AND `timestamp`='".$_SESSION['destination']."' ";
	
	/*while($row1=mysqli_fetch_array($prebook_details,MYSQLI_ASSOC)){ 
	echo $row1['booking_id'];
$_SESSION['bookid']=$row1['booking_id'];

}
	}

else{
	echo "error in setting booking table";
	}

if(!$_SESSION['user_id']){
	$_SESSION['booking']="y";
	
	
	//header("Location: signin.html");
	
	}
else{
	//unset($_SESSION['user']);
	//header("Location: payment_check.php");
	}
*/
if($_SESSION['user_id']){
header("Location: book_vehicle.php");
}

else
{header("Location: signin.html");}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Transmego | Booking</title>
</head>

<body>
</body>
</html>