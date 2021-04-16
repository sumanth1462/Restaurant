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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
      body{
      background-image:linear-gradient(120deg,skyblue 50%,white 50%);
      background-attachment: fixed;
    }
      .tform{
        background: whitesmoke;
        padding: 2px;
        margin-top: 100px;

      }
      .abc{
        margin: 12px;
        font-size: 20px;
        color:black;
        
      }
      .h1{
        background: blue;
        color: white;
        margin: 0px;
      }

      .abc input{
        width: 100%;
        font-size: 25px;
        box-shadow: 2px 4px 12px grey;
        border: none;
        outline: none;
      }
      
      #btn{
        background: green;
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
    <div id="passUpdate" class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3">
        <div class="tform text-center">
          <div class="h1">RESET PASSWORD</div>
        <form onsubmit="return validate()" action="cPass.php" method="post">
        <div id="ab" class="text-center"></div>
        <div class="abc">
          <input type="password" name="npass" id="npass" placeholder="Enter new password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required></div>
        <div class="abc"><input type="password" name="cpass" id="cpass"
        placeholder="Re-enter password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required></div>
        <div class="abc text-center"><button id="btn" name="submit" type="submit">RESET</button></div>
      </form></div>
    </div>
      </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->
    <script type="text/javascript">
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
    </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>