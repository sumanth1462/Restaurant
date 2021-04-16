<?php
require 'config.php';

$sql = "CREATE TABLE userd
(
FullName varchar(50),
EmailId varchar(50),
Password varchar(50),
image_name varchar(255)
)";
if($conn->query($sql)==TRUE){
	echo "Table created";
}
else{
	echo "Error:".$conn->error;
}
$conn->close();
?>