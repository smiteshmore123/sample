<?php
session_start();
require('database.php');
$tentative=$_SESSION["booking_user_id"];
$logged_user=$_SESSION['user_id'];
$category=$_SESSION['category'];
if($category=="bus")
{
$quan =	$_POST['quantity'];
$ac = $_POST['ac'];
$subtype=$quan."-".$ac;
}
else
{
//$subtype=$_POST['subtype'];
$subtype=$_SESSION['subtype'];
}

$result=mysqli_query($link,"UPDATE `booking_table` SET `booking_user_id`='$logged_user', `booking_vehicle_type` = '$category' , `booking_vehicle_subtype` = '$subtype' WHERE `booking_user_id`='$tentative'");

echo "UPDATE `booking_table` SET `booking_user_id`='$logged_user', `booking_vehicle_type` = '$category' , `booking_vehicle_subtype` = '$subtype' WHERE `booking_user_id`='$tentative'";

if($result=1){
	
	header("Location:vehicle_booked.php");
	echo "Executed";
	         }

else   {
	echo "Some problem occured.We will fix it soon.";
	   }


?>