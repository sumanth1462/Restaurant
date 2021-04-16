<?php
  if(isset($_POST['submit'])){
    $tname=$_POST['tname'];
    $bdate=$_POST['bdate'];
    $btime=$_POST['btime'];
    $sql="SELECT * FROM book";
    $result="mysqli_query($conn,$sql)";
    $c=0;
    while(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_assoc($result);
      if($row["TNAME"]==$tname && $row["DATE"]==$bdate && $row["TIME"]==$btime){
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
      $sql="INSERT INTO book('EMAIL','TNAME','DATE','TIME') values('$email','$tname','$bdate','$btime')";
      alert("$tname Successfully booked");
    }
  }


?>