<?php
$server_name="localhost";
$user="root";
$pass="";
$conn=mysqli_connect($server_name,$user,$pass);
if(!$conn){
	die("uncable to connect");
}
else{
	echo "connected";
}
mysqli_close($conn);
?>