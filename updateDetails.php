<?php
require 'config.php';
if(isset($_POST['submit'])){
	$fName=$_POST['fname'];
	$femail=$_POST['femail'];
	$file_name=$_FILES['image']['name'];
	$file_size=$_FILES['image']['size'];
	$file_tmp=$_FILES['image']['tmp_name'];
	$file_type=$_FILES['image']['type'];
	if($_FILES['image']['error']==0){
		move_uploaded_file($file_tmp,"upload/".$file_name);
		$sql="UPDATE userd SET FULLNAME='$fName',image_name='$file_name' WHERE EmailId='$femail'";
			
		if(mysqli_query($conn,$sql)){
			
			header("Location: profile.php");
		}
	}
	else{
		$sql="UPDATE userd SET FULLNAME='$fName' WHERE EmailId='$femail'";
		
		if(mysqli_query($conn,$sql)){
			
			header("Location: profile.php");
		}
	}
}





?>