<?php
//include_once 'db.php';
require 'config.php';
if(isset($_POST['btn'])){
	$fname=$_POST['rname'];
	$email=$_POST['remail'];
	$pass=$_POST['cpass'];
}
//echo $fname." ".$email." ".$pass;
$sql = "INSERT INTO userd(FullName, EmailId, Password,image_name)
VALUES ('$fname','$email','$pass','avatar.png')";
if($conn->query($sql)===TRUE){
	//echo "data recorded";
	header("Location:profile.php");
}
else{
	echo "error".$conn->error;
}
$conn->close();
?>