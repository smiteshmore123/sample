<?php 
session_start();
require("database.php");
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$mobile=$_POST['mobile'];
$usermail=$_POST['email'];
$userpassword=$_POST['password'];
$_SESSION['user']=$_POST['user_email'];
//$_SESSION['user']="smit";
//echo $_SESSION['user'];
//unset($_SESSION['booking']);
$unique_id1=uniqid();
$_SESSION["booking_user_id"]=$unique_id1;

//echo $source;
$result=mysqli_query($link,"INSERT INTO `user_details`(`user_firstname`,`user_lastname`,`mobile`, `email`, `user_unique_id`, `password`, `verified`) VALUES  ('".$firstname."','".$lastname."','".$mobile."','".$usermail."','$unique_id1','".$userpassword."','n')");

if($result=1){
	
	header("Location:book_vehicle.php");
	
	         }

else   {
	echo "Some problem occured.We will fix it soon.";
	   }



?>