<?php

session_start();
require 'config.php';  


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title></title>
    <style>
    body{
    	background-image:linear-gradient(120deg,skyblue 50%,white 50%);
    	background-attachment: fixed;
    }
    .custom{
    	background: whitesmoke;
    	margin-top:100px;
    	padding: 10px;
    	box-shadow: 4px 10px 10px grey;
    	min-height: 200px;
    }
    input[type='email']{
    	width:100%;
    	margin: 2px;
    	font-size: 20px;
    }
    #btn1{
    	margin: 10px;
    	background: green;
    	color: white;
    	border-radius: 15px;
    	border: none;

    }
    #btn1:hover{
    	color:whitesmoke;
    	box-shadow: 2px 4px 6px grey;
    }
    .h1{
    	color: orange;
    }
    </style>
  </head>
  <body>
  	<div class="container">
  		<div class="row">
  			<div class="col-lg-6 offset-lg-3">
  				<div class="custom text-center">
  					<div class="h1">Enter Email Address</div>
  					<?php
                  $msg='';
                  if(isset($_POST['submit'])){
                    $_SESSION["email"]=$_POST["email"];
                    //$_SESSION["pass"]=$_POST["pass"];
                    $email=$_SESSION["email"];
                    $sql="SELECT * FROM userd where EmailId='$email'";
                    $result=$conn->query($sql);
                    if($result->num_rows>0){
                      $row=$result->fetch_assoc();
                      if($row["EmailId"]==$_SESSION["email"]){
                        header("Location: changepass.php");
                      }
                    }
                    else{
                    	$msg= "Email is not valid";
                    } 
                    //echo $email;
                  }


                ?>
  					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method="post">
  						<div style="color:red;"><?php echo $msg; ?></div>
  						<div><input type="Email" name="email" required="required"></div>
  						<div><button type="submit" name="submit" id="btn1">Continue</button></div>
  					</form>
  				</div>
  			</div>
  		</div>
  	</div> 
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>