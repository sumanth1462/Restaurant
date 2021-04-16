
























<?php
  session_start();
  require 'config.php';
  $email=$_SESSION['email'];
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
    <style type="text/css">
		body{
			background-image:linear-gradient(120deg,skyblue 50%,white 50%); 
			background-repeat: no-repeat;
			background-attachment: fixed;
		}
		h1{
			text-align: center;
			color:green;
		}
		table{
			width:100%;
		}
		table,th,td{
			border:1px solid black;
			border-collapse: collapse;

		}
		th{
			background: green;
			font-size: 25px;
		}
		th,td{
			text-align: center;
		}
		td{
			font-size: 20px;
			padding: 2px;
		}
		#link{
			text-decoration: none;
			border: 1px solid blue;
			background: blue;
			color:white;
			box-shadow: 2px 4px 6px grey;

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
        <a class="nav-link" href="#">MyBookings</a>
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
	<h1>My Bookings</h1>
<table>
	<tr>
	<th>Table</th>
	<th>Date</th>
	<th>Time</th>
	<th>Cancel Booking</th>
	</tr>
	<?php
		$result = mysqli_query($conn,"SELECT * FROM book where EMAIL='$email'");
        while($row = mysqli_fetch_array($result)) {
		?>
			<tr>
			<td><?php echo $row['TNAME'];?></td>
			<td><?php echo $row['date'];?></td>
			<td><?php echo $row['TIME'];?></td>
			<td><a id="link" href="delete.php?tname=<?php echo $row['TNAME'];?>">Cancel</a></td>
			</tr>

		<?php
		}
		?>
</table>

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


























