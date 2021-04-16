<?php
  session_start();
  require 'config.php';  
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>form</title>
    <style type="text/css">
      body{
        background: linear-gradient(120deg,skyblue 50%,white 50%);
        background-attachment: fixed;
        
      }
      .custom{
        
        padding: 10px;
        position: relative;
        top:100px;
        box-shadow: 10px 10px 35px rgba(0,0,0,0.3);
        height: 350px;
      }
      .btn{
        border:none;
        background: blue;
        outline: none;
        font-size: 20px;
        color: white;
      }
      .btn:hover{
        box-shadow: 1px 2px 5px grey;
        color: rgba(255,255,255,0.5);
      }
      #btn1{
        background: green;

      }
      .span{
        margin: 2px;
      }
      #title{
        text-align: right;
        margin: 2px;
      }
      .abc{
        margin: 12px;
        font-size: 20px;
        
      }
      .abc input{
        width: 100%;
        font-size: 25px;
        box-shadow: 2px 4px 12px grey;
        border: none;
        outline: none;
      }
      #Sign{
        display: none;
      }
      a{
        text-decoration: none;
      }
      #change{
        color: blue;
        cursor: pointer;
      }
      #change:hover{
        color:skyblue;
      }
      #cdet,#rcdet{
        display: none;
        color: red;
      }
      #edet,#redet{
        display: none;
        color: red;
      }
      #pdet,#rpdet{
        display: none;
        color: red;
      }
      #fp{
        text-align: right;
        padding-right: 8px;
      }
      .store{
        position: relative;
        top:100px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="store">
            <img src="Picture1.png" width="450">
          </div>
        </div>
        <div class="col-md-4 offset-md-4">
          <div class="custom text-center">
              <div id="title"><span class="span"><button class="btn" id="btn1" onclick="signin()">Login</button></span><span class="span"><button class="btn" id="btn2" onclick="signup()">signUp</button></span></div>
              <div id="login">
                <?php
                  $msg='';
                  if(isset($_POST['btn1'])){
                    $_SESSION["email"]=$_POST["email"];
                    $_SESSION["pass"]=$_POST["pass"];
                    $email=$_SESSION["email"];
                    $sql="SELECT * FROM userd where EmailId='$email'";
                    $result=$conn->query($sql);
                    if($result->num_rows>0){
                      $row=$result->fetch_assoc();
                      if($row["EmailId"]==$_SESSION["email"] && $row["Password"]==$_SESSION["pass"]){
                        header("Location: user.php");
                      }
                      else{
                        $msg= "Email Id or Password is invalid";
                      }
                    } 
                    else{
                      $msg= "Invalid Credentials";
                    }
                  }


                ?>
                
                <form onsubmit="return validation()" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method="post">
                  <div id="cdet">Enter Complete Details</div>
                  <div style="color:red;"><?php echo $msg; ?></div>
                  <div class="abc"><input type="text" name="email" id="email" placeholder="Enter Email"></div>
                  <div id="edet">Enter Valid Email Id</div>
                  <div class="abc"><input type="password" name="pass" id="pass" placeholder="password"></div>
                  <div id="pdet">Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters</div>
                  <div id="fp"><a href="fp.php">Forgot Password?</a></div>
                  <div class="abc"><button class="btn" name="btn1" type="submit">Login</button></div>
                  <div>No account?<span id="change" onclick="signup()">Create Account</span></div>
                </form>
              </div>
              <div id="Sign">
                <form onsubmit="return validation1()" action="insert.php" method="post">
                  <div id="rcdet">Enter Complete Details</div>
                  <div class="abc"><input type="text" id="rname" name="rname" placeholder="Full Name"></div>
                  <div class="abc"><input type="text" id="remail" name="remail" placeholder="Enter Email"></div>
                  <div id="redet">Enter Valid Email Id</div>
                  <div class="abc"><input type="password" name="cpass" id="cpass" placeholder="Create password"></div>
                  <div id="rpdet">Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters</div>
                  <div><button class="btn" name="btn" type="submit">signUp</button></div>
                  <div>Already have an account?<span id="change" onclick="signin()">Sign In</span></div>
                </form>
              </div>
          </div>
          
        </div>
      </div>
    </div>
    <script type="text/javascript">
      function signup(){
        document.getElementById('btn1').style.background="blue";
        document.getElementById('btn2').style.background="green";
        document.getElementById("login").style.display="none";
        document.getElementById("Sign").style.display="block";
      }
      function signin(){
        document.getElementById('btn2').style.background="blue";
        document.getElementById('btn1').style.background="green";
        document.getElementById("Sign").style.display="none";
        document.getElementById("login").style.display="block";
      }
      function validation(){
        let id=document.getElementById("email").value;
        let pas=document.getElementById("pass").value;
        let mailformat = /^[a-zA-Z0-9.!#$%&'+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)$/;
        let passformat=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
        if(id=="" || pas==""){
          document.getElementById("cdet").style.display="block";
          document.getElementById("edet").style.display="none";
          document.getElementById("pdet").style.display="none";
          return false;

        }
        else if(!id.match(mailformat)){
          /*var p=document.createElement("p");
          p.innerText="* Enter Email id";
          document.getElementsByClassName("abc")[0].appendChild(p);
          p.style.color="red";*/
          document.getElementById("cdet").style.display="none";
          document.getElementById("edet").style.display="block";
          document.getElementById("pdet").style.display="none";
          return false;
        }
        else if(!pas.match(passformat)){
          /*var p=document.createElement("p");
          p.innerText="* Enter Password";
          document.getElementsByClassName("abc")[1].appendChild(p);
          p.style.color="red";*/
          document.getElementById("cdet").style.display="none";
          document.getElementById("edet").style.display="none";
          document.getElementById("pdet").style.display="block";
          return false;
        }
        else{
            return true;
        }


      }
      function validation1(){
        let fname=document.getElementById("rname").value;
        let rid=document.getElementById("remail").value;
        let rpas=document.getElementById("cpass").value;
        let rmailformat = /^[a-zA-Z0-9.!#$%&'+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)$/;
        let rpassformat=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
        //alert(fname);
        if(fname=="" || rid=="" || rpas==""){
          document.getElementById("rcdet").style.display="block";
          document.getElementById("redet").style.display="none";
          document.getElementById("rpdet").style.display="none";
          //alert("abc");
          return false;
        }
        else if(!rid.match(rmailformat)){
          document.getElementById("redet").style.display="block";
          document.getElementById("rcdet").style.display="none";
          document.getElementById("rpdet").style.display="none";
          return false;
        }
        else if(!rpas.match(rpassformat)){
          document.getElementById("rpdet").style.display="block";
          document.getElementById("rcdet").style.display="none";
          document.getElementById("redet").style.display="none";
          return false;
        }
        //alert("abc");
        return true;

      }
    </script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>
<!--background-image: url(https://sanskriti.edu.in/blog/wp-content/uploads/2017/12/hotel.jpg);
        background-attachment:fixed;
        background-position: center;
        background-repeat: no-repeat;-->
<!--background: linear-gradient(120deg,white 50%,skyblue 50%);-->

