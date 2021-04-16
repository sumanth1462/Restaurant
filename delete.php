<?php
  session_start();
  require 'config.php';
  $email=$_SESSION['email'];
  $tname=$_GET['tname'];
  $result = mysqli_query($conn,"DELETE FROM book where EMAIL='$email' AND TNAME='$tname'");
  mysqli_close($conn);
  header("Location: mybook.php");

?>