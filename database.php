<?php  
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="transmego"; // Database name 
 

// Connect to server and select database.
$link=mysqli_connect("localhost","root","")or die("cannot connect"); 
mysqli_select_db($link,"transmego")or die("cannot select DB");


?>