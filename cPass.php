<?php
session_start();
require 'config.php';
$email=$_SESSION["email"];
if(isset($_POST['submit'])){
	$pas=$_POST['npass'];
	$sql="UPDATE userd SET Password='$pas' WHERE EmailId='$email'";
	if(mysqli_query($conn,$sql)){
		
		session_unset();
		session_destroy();
		echo "<script>
		alert('Password Successfully Updated');
		window.location.href='sign.php';  
		</script>";
	}
mysqli_close($conn);
}