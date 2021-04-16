<?php
  session_start();
  require 'config.php';
  $email=$_SESSION["email"];
  if(isset($_POST['submit'])){
    $tname=$_POST["tname"];
    $bdate=$_POST["bdate"];
    $btime=$_POST["btime"];
    
    //echo strtotime($btime);
    $sql="SELECT * FROM book";
    //echo $tname." ".$bdate." ".$btime." ".$email;
    $result=mysqli_query($conn,$sql);
    $c=0;
    /*$sql="INSERT INTO book(EMAIL,TNAME,date,TIME) VALUES ('$email','$tname','$bdate','$btime') WHERE NOT In(SELECT * FROM book)";
    if (mysqli_query($conn, $sql)){
          echo "table booked";
        }
        else{
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }*/
    if(mysqli_num_rows($result) == 0){
      $sql="INSERT INTO book(EMAIL,TNAME,date,TIME) VALUES ('$email','$tname','$bdate','$btime')";
        //alert("$tname Successfully booked");
        if (mysqli_query($conn, $sql)){
          echo "<script>
            alert('Table booked');

          </script>";
          //header("Location: mybook.php");
        }
        else{
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    else{
      //echo "show";
      while($row = mysqli_fetch_assoc($result)){
        //echo $row["TNAME"]." ".$row["date"]." ".strtotime($row["TIME"]);
        if(($row["TNAME"]==$tname)&&($row["date"]==$bdate)&&(strtotime($row["TIME"])==strtotime($btime))){
          /*echo "<script>
            alert('Table is already booked by other customer');

          </script>";*/
          $c=0;
          //echo "Table is already booked by other customer";
          echo "<script>
            alert('Table is already booked by other customer');

          </script>";
          break;
        }
        else{
          $c=1;
        }


    }
    if($c==1){
      $sql="INSERT INTO book(EMAIL,TNAME,date,TIME) VALUES ('$email','$tname','$bdate','$btime')";
      //alert("$tname Successfully booked");
      if (mysqli_query($conn, $sql)){
        echo "<script>
            alert('Table booked');

          </script>";
          //header("Location: mybook.php");
      }
      else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      
    }
    }
    
    /*else{
      $sql="INSERT INTO book(EMAIL,TNAME,date,TIME) VALUES ('$email','$tname','$bdate','$btime')";
        //alert("$tname Successfully booked");
      if (mysqli_query($conn, $sql)){
          echo "table booked";
        }
        else{
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }*/
    
  }  
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
      body{
        background: white;
      }
      .blur{
        filter: opacity(40%);
      }
      .table{
        background:rgba(0,0,0,0.1);
        min-height: 200px;
        text-align: center;
        font-size: 30px;
      }
      .table:hover{
        box-shadow: 2px 4px 6px grey;
      }
      .hut{
        background: linear-gradient(180deg,rgb(244, 196, 48) 50%,brown 50%);
        min-height: 200px;
        margin-top: 10px;
        border-top-right-radius: 180px;
        border-top-left-radius: 180px;
        text-align: center;
        font-size: 30px;
      }
      .hut:hover{
        box-shadow: 4px 8px 10px grey;
      }
      .h2{
        width:300px;
        background: blue;
        border-radius: 30px;
        box-shadow: 2px 2px 10px blue;
        margin-top: 10px;
        text-align: center;
      }
      #pop{
        display: none;
        padding: 10px;
        position: absolute;
        top:200px;

      }
      .tform{
        background: rgba(0,0,0,0.8);
        border-radius: 15px;

      }
      .abc{
        margin: 12px;
        font-size: 20px;
        color:whitesmoke;
        
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
      #btn:hover{
        color:whitesmoke;
        box-shadow: 2px 4px 10px grey;
      }
    </style>
    <title>User Home Page</title>
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
        <a class="nav-link" href="#">Book</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Order Food</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="mybook.php">MyBookings</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">MyProfile</a>
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
    <div class="container" id="main">
      <div class="h2">Book A Table</div>
      <ul>
        <li>No Compementary.</li>
        <li>Suitable for 4 members</li>
      </ul>
      <div class="row">
        <div class="col-md-4">
          <a onclick="reserveTable('T1')"><div class="table">T1</div></a>
        </div>
        <div class="col-md-4">
          <a onclick="reserveTable('T2')"><div class="table">T2</div></a>
        </div>
        <div class="col-md-4">
          <a onclick="reserveTable('T3')"><div class="table">T3</div></a>
        </div>
      </div>
      <div class="h2">Book A Lounge</div>
      <div>
        <ul>
          <li>Rs.200 For one lounge. Amount will be added to The final Bill</li>
          <li>Suitable for 8 members.</li>
          <li>A Servant is assigned throughout the dine.</li>
          <li>Ensures Privacy of the customer.</li>
          <li>Welcome drink as per customer's choice is given as complementary</li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6">
          <a onclick="reserveHut('H1')"><div class="hut">H1
          </div></a>
        </div>
        <div class="col-md-6">
          <a onclick="reserveHut('H2')"><div class="hut">H2
          </div></a>
      </div>
      <div class="row">
        <div class="col-md-6">
          <a onclick="reserveHut('H3')"><div class="hut">H3
          </div></a>
        </div>
        <div class="col-md-6">
          <a onclick="reserveHut('H4')"><div class="hut">H4
          </div></a>
        </div>
      </div>
    </div>
  </div>
  <div id="pop" class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4">
        <div class="tform">
          <div id="close"><a onclick="close1()">X</a></div>
          <div id="rform"><form  method="post" action="">
            <div class="abc">
              <p id="name">Table</p>
              <input type="text" name="tname" id="tname" readonly="readonly"></div>
            <div class="abc">
              <p>Date</p>
              <input type="date" name="bdate" required="required"></div>
            <div class="abc">
              <p>Time</p>
              <input type="time" name="btime" required="required"></div>
            <div class="abc text-center"><button id="btn" name="submit" type="submit">Reserve</button></div>
          </form></div>
          
        </div>
        
      </div>
      
    </div>
    
  </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script type="text/javascript">
      function reserveTable(val){
        //this.val=val-1;
        //console.log(val);
        /*var time=prompt("Enter date and time","27/04/2020 11:30AM");
        var t=document.getElementsByClassName("table");
        alert(time);
        if(time==""||time==null){
          alert("Enter Date and Time!!");
        }
        else{
          alert("Table Successfully Reserved.Hope You will a good time.");
          t[this.val].style.background="green";
          t[this.val].innerHTML="reserved"+"<br/>"+time;
        }*/
        document.getElementById("name").innerHTML="Table";
        document.getElementById("tname").value=val;
        //document.getElementById("main").setAttribute('class','blur');
        //document.getElementById("main").style.display="none";
        document.getElementById("pop").style.display="block";
        document.getElementById("main").style.opacity="0.1";
      }
      function reserveHut(value){
        /*this.value=value-1;
        console.log(this.value);
        var time=prompt("enter date and time");
        var t=document.getElementsByClassName("table");
        alert(time);
        if(time==""||time==null){
          alert("Enter Date and Time!!");
        }

        else{
          alert("Table Successfully Reserved. You just made the best choice. Hope You will a good time.");
          t[this.val].style.background="green";
          t[this.val].innerHTML="reserved"+"<br/>"+time;
        }*/
        document.getElementById("name").innerHTML="HUT";
        document.getElementById("tname").value=value;
        //document.getElementById("main").setAttribute('class','blur');
        //document.getElementById("main").style.display="none";
        document.getElementById("pop").style.display="block";
        document.getElementById("main").style.opacity="0.1";
      }
      function close1(){
        //document.getElementById("main").style.display="block";
        document.getElementById("pop").style.display="none";
        document.getElementById("main").style.opacity="1";
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