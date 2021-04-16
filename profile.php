<?php

  session_start();
  require 'config.php';
  $email=$_SESSION["email"];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Profile</title>
    <style>
      body{
        background: black;
      }
      .main{

      }
      span{
        margin: 10px;
        font-size: 20px;
        cursor: pointer;
        color:blue;
      }
      a{
        text-decoration: none;
      }
      #popPof{
        display: none;
        position: absolute;
        top:100px;
      }
      #passUpdate{
        display: none;
        position: absolute;
        top:100px;
      }
      .tform{
        background: rgb(255,255,255);
        border-radius: 15px;

      }
      .abc{
        margin: 12px;
        font-size: 20px;
        color:black;
        
      }
      .abc input{
        width: 100%;
        font-size: 25px;
        box-shadow: 2px 4px 12px grey;
        border: none;
        outline: none;
      }
      #close{
        text-align: right;
        cursor: pointer;
        padding: 2px;
        font-size: 20px;
        color: red;
      }
      #btn{
        background: blue;
        border: none;
        border-radius: 20px;
        color:white;
        margin: 4px;
      }
      #ab{
        color:red;
      }
      #btn:hover{
        color:whitesmoke;
        box-shadow: 2px 2px 10px grey;
      }
      .name{
        color:green;
      }
      p{
        color: blue;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#" style="color:gold;">
        <img src="Picture1.png" width="50" height="40" class="d-inline-block align-top" alt="">
        <b>Tasty Treat</b>
      </a>
  <div class="collapse navbar-collapse" id="navbarNav">
    <?php
        $result = mysqli_query($conn,"SELECT * FROM userd where EmailId='$email'");
        while($row = mysqli_fetch_array($result)) {
      ?>
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="user.php">Book</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Order Food</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="mybook.php">MyBookings</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">MyProfile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" style="color:green;">Welcome</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" style="color:blue;"><?php echo $row['FullName'];?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><img src="upload/<?php echo $row['image_name'];?>" name="profileImg" style="border-radius: 50%; " width="50" height="40"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
    </ul>


    <a href="log.php"><button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="float: right;">Logout</button></a>
  </div>
  <?php
      }
      ?>
</nav>
    <div class="container main" id="header">
      <div class="row">
        <div class="col-md-4 offset-md-8">
          <div><a onclick="editProf()"><span>Edit Profile</span></a><a onclick="changePass()"><span>Change Password</span></a></div>
        </div>
      </div>
      <?php
        $result = mysqli_query($conn,"SELECT * FROM userd where EmailId='$email'");
        while($row = mysqli_fetch_array($result)) {
      ?>
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6">
              <div class="">
                <img src="upload/<?php echo $row['image_name'];?>" name="profileImg" style="border-radius: 50%; border:5px solid blue;" width="250" height="220">
            
          </div>
            </div>
            
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="custom">
            <div class="h1 name"><?php echo $row['FullName'];?></div>
          </div>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-12">
          <div class="custom">
            <div class="h4 name"><?php  echo $email;  ?></div>
          </div>
        </div>
      </div>
    </div>
    <div id="popPof" class="container">
      <div class="row">
        <div class="col-md-4 offset-md-6">
        <div class="tform">
        <div id="close"><a onclick="close1()">X</a></div>
        <form action="updateDetails.php" method="post" enctype="multipart/form-data">
        <div class="abc">
          <p>FullName</p>
          <input type="text" name="fname" value="<?php echo $row['FullName'];?>"></div>
        <div class="abc">
          <p>Email ID</p><input type="text" name="femail" readonly="readonly" value="<?php  echo $email;  ?>"></div>
        <div class="abc"><p>Profile Picture</p><input type="file" name="image" accept=".png, .jpg, .jpeg"></div>
        <div class="abc text-center"><button id="btn" name="submit" type="submit">Update</button></div>
      </form></div>
    </div>
      </div>
        <?php
      }
      ?>
      </div>
      
    <div id="passUpdate" class="container">
      <div class="row">
        <div class="col-md-4 offset-md-6">
        <div class="tform">
        <div id="close"><a onclick="close1()">X</a></div>
        <form onsubmit="return validate()" action="cPass.php" method="post">
        <div id="ab" class="text-center"></div>
        <div class="abc">
          <p>Password</p><input type="password" name="npass" id="npass" placeholder="Enter new password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required></div>
        <div class="abc"><p>Confirm Password</p><input type="password" name="cpass" id="cpass"
        placeholder="Re-enter password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required></div>
        <div class="abc text-center"><button id="btn" name="submit" type="submit">Update</button></div>
      </form></div>
    </div>
      </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script>
      function validate(){
        var np=document.getElementById("npass").value;
        var cp=document.getElementById("cpass").value;
        if(np==cp){
          return true;
        }
        else{
          document.getElementById("ab").innerHTML="* Password and confirm password not matching";
          return false;
        }

      }
      function editProf(){
        document.getElementById("popPof").style.display="block";
        document.getElementById("passUpdate").style.display="none";
        document.getElementById("header").style.opacity="0.2";
      }
      function changePass(){
        document.getElementById("passUpdate").style.display="block";
        document.getElementById("popPof").style.display="none";
        document.getElementById("header").style.opacity="0.2";
      }
      function close1(){
        //document.getElementById("main").style.display="block";
        document.getElementById("popPof").style.display="none";
        document.getElementById("passUpdate").style.display="none";
        document.getElementById("header").style.opacity="1";
        //document.getElementById("main").removeAttribute('class','blur');
      }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>