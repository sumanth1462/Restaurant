<?php
$server_name="localhost";
$user="root";
$pass="";
$conn=mysqli_connect($server_name,$user,$pass);
if(!$conn){
	die("uncable to connect:".$conn->connect->error);
}
$sql="CREATE DATABASE restaurent";
if($conn->query($sql)===TRUE){
	echo "Database created";
}
else{
	echo "error".$conn->error;
}
$conn->close();
?>