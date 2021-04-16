<?php

$server_name="localhost";
$user="root";
$pass="";
$db="restaurent";
$conn=mysqli_connect($server_name,$user,$pass,$db);
if(!$conn){
	die("unable to connect:".$conn->connect_error);
}


?>